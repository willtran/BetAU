<?php

class ArticleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Get all categories in the system
		$oArticle = DB::table('articles')
						->join('domains', 'articles.domain_id', '=', 'domains.id')
						->orderBy('articles.title', 'ASC')
						->get(array('articles.*', 'domains.name as domain_name'));
						
		return View::make('article.index')->with('articles', $oArticle)
			->with('menu', array('main' => 'article', 'side_bar' => 'index'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Get domain list
		$oDomain = new Domain();
		$aDomainList = $oDomain->getDomainSelect();
		
		// Get domain id if have
		$sDomainID = Input::get('domain');

		return View::make('article.create')
			->with('domain_list', $aDomainList)
			->with('domain', $sDomainID)
			->with('menu', array('main'=> 'article','side_bar'=>'create'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Get article posted data
		$aArticleData = Input::all();
		
		// Define validation rules
		$aRules = array(
			'domain_id'			=> 'required',
			'title' 			=> 'required|unique:articles,title',
			'cover_image'		=> 'mimes:png,jpg,jpeg',
			'description'		=> 'required|max:256',
			'content'			=> 'required',	
		);
		
		// Process validation checking, redirect to create form if the validation was failed,
		// otherwise create a new domain
		
		$oValidation = Validator::make($aArticleData, $aRules);
		
		if($oValidation->fails())
		{
			if(!$aArticleData['domain'])
			{
				return Redirect::route('admin.article.create')
					->withErrors($oValidation)->withInput();
			}
			else
			{
				return Redirect::route('admin.article.create', array('domain' =>$aArticleData['domain']))
					->withErrors($oValidation)->withInput();
			}
		}

		// Process add article
		// Generate label
		$aArticleData['label'] = $this->generateLabel($aArticleData['title']);
		
		$aArticleData['description'] = strip_tags($aArticleData['description'],"<a>");
		$aArticleData['content'] = strip_tags($aArticleData['content'],"<a>");
		
		// Generate shorten content
		$aArticleData['short_content'] = $this->generateShortContent($aArticleData['content'], 750);
		
		// Replace \n by <br> for display html layout
		$aArticleData['short_content'] = nl2br($aArticleData['short_content']);
		$aArticleData['content'] = nl2br($aArticleData['content']);
		
		$oArticle = new Article($aArticleData);
		$oArticle ->save();
		
		// Upload cover image
		if($aArticleData['image'])
		{
			$sImgPath = $oArticle->createImageStorage();
			$imgFile  = $aArticleData['image'];
			$sImgName = md5($imgFile->getClientOriginalName().time()).'.'.$imgFile->getClientOriginalExtension();
			
			$imgFile->move( $sImgPath, $sImgName);
			$oArticle['cover_image'] = str_replace(public_path(), '', $sImgPath."/".$sImgName);
			$oArticle->save();
		}
		
		return Redirect::route('admin.article.index')->with('flash_notice', 'Article <strong>'.$aArticleData['title'].'</strong> had been created.');;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$oArticle = Article::find($id);
		
		if(!$oArticle)
		{
			return Redirect::route('admin.article.index')->with('flash_error', 'Selected article not found!');
		}
		else 
		{
			$oArticle->content = str_replace(array('<br/>','<br />','<br>'), '', $oArticle->content);
			
			// Get domain list
			$oDomain = new Domain();
			$aDomainList = $oDomain->getDomainSelect();
		
			return View::make('article.edit')
				->with('article',$oArticle)
				->with('domain_list', $aDomainList)
				->with('menu',array('main'=>'article', 'side_bar'=>'index'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Get selected layout
		$oArticle = Article::find($id);
		if(!$oArticle)
		{
			return Redirect::route('admin.article.index')
					->with('flash_error', 'Selected article not found!')
					->withInput();
		}
		
		// Get post data
		$aArticleData = Input::all();
		
		// Define validation rules
		$aRules = array(
			'title' 			=> 'required',
			'cover_image'		=> 'mimes:png,jpg,jpeg',
			'description'		=> 'required|max:256',
			'content'			=> 'required',	
		);
		
		if($aArticleData['title'] != $oArticle->title)
		{
			$aRules['title'] =  'required|unique:layouts,name';
		}
		
		// Process validation checking, redirect to edit form if the validation was failed,
		// otherwise update the selected user, 
		$oValidation = Validator::make($aArticleData, $aRules);
		if($oValidation->fails())
		{
			return Redirect::route('admin.article.edit', array('article' => $oArticle->id))
			->with('article', $oArticle)
			->withErrors($oValidation);
		}
		
		// Process edit article
		// Generate label
		$aArticleData['label'] = $this->generateLabel($aArticleData['title']);
		
		$aArticleData['description'] = strip_tags($aArticleData['description'],"<a>");
		$aArticleData['content'] = strip_tags($aArticleData['content'],"<a>");
		
		// Generate shorten content
		$aArticleData['short_content'] = $this->generateShortContent($aArticleData['content'], 750);
		
		// Replace \n by <br> for display html layout
		$aArticleData['short_content'] = nl2br($aArticleData['short_content']);
		$aArticleData['content'] = nl2br($aArticleData['content']);
		
		// Upload cover image
		if($aArticleData['image'])
		{
			$sImgPath = $oArticle->createImageStorage();
			
			// Remove old image
			if($oArticle->cover_image)
			{
				File::delete(public_path().$oArticle->cover_image);
			}
			
			// Upload new image
			$imgFile  = $aArticleData['image'];
			$sImgName = md5($imgFile->getClientOriginalName().time()).'.'.$imgFile->getClientOriginalExtension();
			$imgFile->move( $sImgPath, $sImgName);
			$oArticle->cover_image = str_replace(public_path(), '', $sImgPath."/".$sImgName);
		}
		
		// Update article
		$oArticle->title = $aArticleData['title'];
		$oArticle->label = $aArticleData['label'];
		$oArticle->description = $aArticleData['description'];
		$oArticle->short_content = $aArticleData['short_content'];
		$oArticle->content = $aArticleData['content'];
		$oArticle ->save();
		
		return Redirect::route('admin.article.index')->with('flash_notice', 'Article <strong>'.$aArticleData['title'].'</strong> had been updated.');;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Get selected article
		$oArticle = Article::find($id);
		if(!$oArticle)
		{
			Redirect::route('admin.article.index')
					->with('flash_error', 'Selected article not found!')
					->withInput();
		}
		
		// Delete cover image
		$oArticle->removeCoverImage();
		 
		// Process delete article
		$oArticle->delete();
		
		return 'The article <strong>'.$oArticle->title.'</strong> had been successfully deleted!';
	}
	
	/**
	 * create article label according to article title
	 */
	private function generateLabel($sData)
	{
		if(!$sData)
		{
			return false;
		}
		
		$aFilter = array('!','@','#','$','%','^','&','*','(',')',
						 '?','.',',','/','\\','}','{','=','+','`',
						 '~',':',';','"','\'','<','>');
		$sLabel = str_replace($aFilter, '', strtolower($sData));
		$sResult = str_replace(array('-',' '), '_', $sLabel);
		
		return $sResult;
	}
	private function generateShortContent($sData, $iLength)
	{
		if(!$sData || $iLength == 0)
		{
			return '';
		}
		
		if(strlen($sData)<=$iLength)
		{
			return $sData;	
		}
		else {
			$sTemp = substr($sData, 0, $iLength);
			for($i=$iLength-1;$i>=0;$i--)
			{
				if($sTemp[$i] == " ")
				{
					$sTemp = substr($sTemp,0,$i)." ...";
					break;
				}
			}
			return str_replace('\n','<br/>',$sTemp);;
		}
	}
}