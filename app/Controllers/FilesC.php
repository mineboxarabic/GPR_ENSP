<?php 

class FilesC extends Controller{
   public function uploadFile($typeOfFile, $idUser){
          // Define the new file name
    $newFileName = $typeOfFile . '_' . $idUser;
    
    // Define the target directory for the file upload
    $targetDir = '../public/uploads/'. $idUser . '/';
    echo $targetDir;
    // If the target directory doesn't exist, create it
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    
    //get the file extension
    $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    // Define the full path for the uploaded file
    $targetFilePath = $targetDir . $newFileName . '.' . $extension;
    
    // Check if the uploaded file is an image or a pdf
    $fileType = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
    
    if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "pdf") {
        // Invalid file type
       $data = ['bigTitle'=>"Fiche utilisateur",'title'=>'Fiche utilisateur', 'user'=>User::where('id', $idUser)->first()];
        $notifMessage = "Type de fichier invalide";
        echo "<script>\n
            $.notify({\n
                message: '$notifMessage'\n
            }, {\n
                type: 'danger'\n
            });\n

    </script>\n".
    $this->view('Template/inc.NavTS', ['title'=>'Fiche utilisateur','bigTitle'=>"Fiche utilisateur"]).
        $this->view('userFile',$data).
        $this->view('Template/inc.Footer');
    }
    
    // Upload the file
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
        // File upload successful
        $user = User::find($idUser);

        //Update the user's lien_attest, lien_conv in the database
        if($typeOfFile == 'attest'){
            User::where('id', $idUser)->update([
                'lien_attest' => $newFileName . '.' . $extension,
                ]);
        
        
            }else if($typeOfFile == 'conv'){
                User::where('id', $idUser)->update([
                    'lien_conv' => $newFileName . '.' . $extension,
                    ]);
            }

        $data = ['title'=>'Fiche utilisateur','bigTitle'=>"Fiche utilisateur", 'user'=>$user];
        /*echo $this->view('Template/inc.NavTS', ['title'=>'Fiche utilisateur']).
            $this->view('userFile',$data).
         $this->view('Template/inc.Footer');*/

         //go back to the previous page
            header('Location: ' . $_SERVER['HTTP_REFERER']);




    } else {
        // File upload failed

    $data = ['bigTitle'=>"Fiche utilisateur",'title'=>'Fiche utilisateur', 'user'=>User::where('id', $idUser)->first()];
        $notifMessage = "Un problème est survenu lors de l'upload du fichier";
        echo "<script>\n$.notify({\nmessage: '$notifMessage'\n}, {\ntype: 'danger'\n});\n</script>\n"
        .$this->view('Template/inc.NavTS', ['title'=>'Fiche utilisateur']).
        $this->view('userFile',$data).
        $this->view('Template/inc.Footer');
    }
   }

   public function deleteFile($typeOfFile, $idUser){
        $user= User::where('id', $idUser)->first();
        $type = $typeOfFile == 'attest'? "lien_attest":"lien_conv";
        echo $type;
        $fileName = $user[$type];
        if($typeOfFile == 'attest'){
            User::where('id', $idUser)->update([
                'lien_attest' => null,
                ]);
        
        
            }else if($typeOfFile == 'conv'){
                User::where('id', $idUser)->update([
                    'lien_conv' => null,
                    ]);
            }

        //delete the file from the server
        $newFileName = $typeOfFile . '_' . $idUser;
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $targetDir = '../public/uploads/'. $idUser . '/' . $newFileName . '.' . $extension;

        if(file_exists($targetDir)){
            unlink($targetDir);
        }


        header('Location: ' . $_SERVER['HTTP_REFERER']);
   }
}