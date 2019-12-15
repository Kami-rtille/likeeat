<?php


$id=$_SESSION["id"];

$dossier = 'uploads/'.$id.'/';
if(!is_dir($dossier)){
   mkdir($dossier);
}
    $uploadDirectory = 'uploads/'.$id.'/';

    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['jpeg','jpg','png','JPEG','JPG','PNG']; // Get all the file extensions

		if(isset($_FILES['myfile']['name'])){
			  $fileName = $_FILES['myfile']['name'];
		}

		if(isset($_FILES['myfile']['size'])){
				$fileSize = $_FILES['myfile']['size'];
		}

		if(isset($_FILES['myfile']['tmp_name'])){
			    $fileTmpName  = $_FILES['myfile']['tmp_name'];
		}

			if(isset($_FILES['myfile']['type'])){
	  			$fileType = $_FILES['myfile']['type'];
			}

			if(isset($fileName)){
					$tmp = explode('.', $fileName);
					$fileExtension = end($tmp);
					 $uploadPath = $uploadDirectory.basename($fileName);
			}


    if (isset($_POST['submit'])) {

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "Cette extension de fichier n'est pas autorisée. Veuillez télécharger un fichier JPEG ou PNG";
        }

        if ($fileSize > 30000000) {
            $errors[] = "Ce fichier fait plus de 30 Mo. Désolé, il doit être inférieur ou égal à 30 Mo";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                echo "Le fichié " . basename($fileName) . " a bien été mis en ligne";
								$chemin="$id/".basename($fileName);


						//	$req = $bdd->prepare("UPDATE user SET avatar=:photo WHERE id = $id");
						// $req->execute(array(":photo"=>$chemin));
						$sql="UPDATE user SET avatar = ? WHERE id=$id";
						$query = $pdo->prepare($sql);
						$query->execute(array("$chemin"));
						header("Location:".$_SERVER['HTTP_REFERER']);
						/*		$sql="UPDATE user SET couverture = ? WHERE id=$id";
								$query = $pdo->prepare($sql);
								$query->execute(array("$chemin"));
								header("Location:".$_SERVER['HTTP_REFERER']); ---------> Couverture et rajouter une colonne couverture dans bdd*/

						/*		$sql="UPDATE ecrit SET image = ? WHERE id=$id";
									$query = $pdo->prepare($sql);
									$query->execute(array("$chemin"));
									header("Location:".$_SERVER['HTTP_REFERER']); ---------> Couverture et rajouter une colonne couverture dans bdd*/

							            }
							        }
							    }





	?>

    <div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(35, 35, 35);">
    </div>

    <div class="container">
        <div class="media-container-row">
            <div class="mbr-figure" style="width: 100%;">
              <?php
              $sql = "SELECT avatar FROM user WHERE id=?";
              $q = $pdo->prepare($sql);
              $q->execute([$_SESSION['id']]);

              while($lien=$q->fetch()) {
                echo "<img id='blah' src='uploads/".$_SESSION['avatar']."'/>";
              }
              ?>

            </div>

            <div class="media-content">
                <h1 class="mbr-section-title mbr-white pb-3 mbr-fonts-style display-1">
                    J'envoie ma photo</h1>

				 <form role="form" class="content" id="form1" runat="server" method="post" autocomplete="off" enctype="multipart/form-data">
							<div class="row">

										<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<label class="mbr-section-btn" style="font-size:150%;"><a class="btn btn-md btn-info display-4">
								Choisir la photo<input type="file" style="display: none;" name="myfile" id="fileToUpload" accept="image/*" capture required>
								</a></label>



								</div>
				<input type="submit" class="btn btn-md btn-white-outline display-4" name="submit" id="submit" value="Envoyer" ><br/>

            </div>
			</form>
				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo "<div class='alert alert-danger' role='alert' style='font-size:150%;'>".$error."</div>";
					}
				}
				?>
        </div>
          <a href='index.php?action=mur&id=<?php echo $_SESSION['id'] ?>'> Retour </a>
    </div>

<script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileToUpload").change(function(){
        readURL(this);
    });
});//]]>

</script>

	<script type="text/javascript">
function bloque_checkbox()
{
  document.getElementById("terms" ).disabled = true;
}
</script>

	<script src="js/webfontloader.min.js"></script>

	<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
	</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#submit').bind("click",function()
    {
        var imgVal = $('#fileToUpload').val();
        if(imgVal=='')
        {
            alert("Tu as oublié de charger la photo ! 😅");
            return false;
        }


    });
});
</script>
