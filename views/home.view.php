<?php 
$css = "home.css";
require 'partials/header.partial.php';
?>


<script>


    
</script>

<?php if(true) { ?>

    <!--Upload File-->
    <div id="uploadFile">
        <form action="/upload" method="post" enctype="multipart/form-data">
        <input type="file" name="file[]" multiple>
        <button type="submit">Upload</button>
        
        </form>
    
    </div>


    <!--File Library-->
    <div id="fileLibrary">
    <h1>Your Files</h1>
        <ul>
        <!--For loop to push out the files-->
        <?php for($i = 0; $i < count($data->files); $i++){ ?>
            <!--List that is repeated out for each file-->
            <li><a id="<?=$data->files[$i]->ID?>" href="<?=$web?>core/download.php?ID=<?=$data->files[$i]->ID?>&FileName=<?=$data->files[$i]->Title?>" download>
                <?=$data->files[$i]->Title?>
            </a>
             | 
            <button  onclick="FileDelete(<?=$data->files[$i]->ID?>)">Delete</button>
            </li>
        <?php } ?>
        </ul>
    </div>

<?php } ?>


<?php require 'partials/footer.partial.php'; ?>