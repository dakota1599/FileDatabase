

<?php if(true) { ?>

    <!--Upload File-->
    <div id="uploadFile">
        <form action="/upload" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
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
            <li><a href="/download?contents=<?=$data->files[$i]->Contents?>&name=<?=$data->files[$i]->Name?>" download>
                <?=$files[$i]->Name?>
            </a></li>
        <?php } ?>
        </ul>
    </div>

<?php } ?>