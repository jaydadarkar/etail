<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->role == "admin" || Auth::user()->role == "manager" || Auth::user()->role == "blogger"){
            if(!empty($request->folder)){
                $folder = $request->folder;
                try {
                    // Folders
                    $dirNames = array();  
                    $this->folderPath = "storage/".$folder."/";
                    $getAllDirs = File::directories( public_path( $this->folderPath ) );
                    foreach( $getAllDirs as $dir ) {
                        $dirNames[] = basename($dir);
                    }
        
                    // Files
                    $filesArr = array();
                    $this->folderPath = "storage/".$folder."/";
                    $folderPth = public_path( $this->folderPath );
                    $files = File::files( $folderPth );
                    $replaceDocPath = str_replace( public_path(),'',$this->folderPath );
                    foreach( $files as $file ) {
                        $filesArr[] = array( 'fileName' => $file->getRelativePathname(), 'fileUrl' => url($replaceDocPath.$file->getRelativePathname()) );
                    }
    
                    return response()->json(array('dirNames' => $dirNames, 'filesArr' => $filesArr), 200);
    
                } catch ( Exception $ex ) {
                    Log::error( $ex->getMessage() );
                }
            }
            else{
                try {
                    // Folders
                    $dirNames = array();  
                    $this->folderPath = "storage/";
                    $getAllDirs = File::directories( public_path( $this->folderPath ) );
                    foreach( $getAllDirs as $dir ) {
                        $dirNames[] = basename($dir);
                    }
        
                    // Files
                    $filesArr = array();
                    $this->folderPath = "storage/";
                    $folderPth = public_path( $this->folderPath );
                    $files = File::files( $folderPth );
                    $replaceDocPath = str_replace( public_path(),'',$this->folderPath );
                    foreach( $files as $file ) {
                        $filesArr[] = array( 'fileName' => $file->getRelativePathname(), 'fileUrl' => url($replaceDocPath.$file->getRelativePathname()) );
                    }
    
                    return response()->json(array('dirNames' => $dirNames, 'filesArr' => $filesArr), 200);
    
                } catch ( Exception $ex ) {
                    Log::error( $ex->getMessage() );
                }
            }
        }
        else{
            return response()->json('Error',401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role == "admin" || Auth::user()->role == "manager" || Auth::user()->role == "blogger"){

            $validate = $request->validate([
                'file' => 'required|mimes:csv,txt,jpg,jpeg,png,pdf,webp,xls,xlsx,doc,docx,svg',
            ]);

            $folder = $request->directoryName;
            if($request->hasFile('file')){
                $name = $request->file('file')->getClientOriginalName();
                $fileNameToStore = $name;
                if($folder == ""){
                    $path = $request->file('file')->storeAs('public/',$fileNameToStore);
                    return response()->json('File Uploaded', 200);
                }
                else{
                    $path = $request->file('file')->storeAs('public/'. $folder .'/',$fileNameToStore);
                    return response()->json('File Uploaded', 200);
                }
            }
        }
        else{
            return response()->json('Error',401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }

    public function createFolder(Request $request){
        $currentFolder = $request->currentFolder;
        $newFolder = $request->newFolder;
        $path = public_path().'/storage/';

            if($currentFolder == ''){
                if(!File::exists($path . $newFolder)){
                    File::makeDirectory($path . $newFolder, 0777, true, true);
                }
            }
            else{
                if(!File::exists($path. $currentFolder .'/'. $newFolder)){
                    File::makeDirectory($path. $currentFolder .'/'. $newFolder, 0777, true, true);
                }
            }
    }

    public function deleteFile(Request $request){
        $currentFolder = $request->currentFolder;
        $file = $request->file;
        $path = public_path().'/storage/';

        if($currentFolder == ''){
            if(File::exists($path . $file)){
                File::delete($path . $file);
            }
        }
        else{
            if(File::exists($path. $currentFolder .'/'. $file)){
                File::delete($path. $currentFolder .'/'. $file);
            }
        }
    }

    public function deleteFolder(Request $request){
        $currentFolder = $request->currentFolder;
        $toDeleteFolder = $request->folder;
        $path = public_path().'/storage/';

        if($currentFolder == ''){
            if(File::exists($path . $toDeleteFolder)){
                File::deleteDirectory($path . $toDeleteFolder);
            }
        }
        else{
            if(File::exists($path. $currentFolder .'/'. $toDeleteFolder)){
                File::deleteDirectory($path. $currentFolder .'/'. $toDeleteFolder);
            }
        }
    }
}
