<?php
$css = "home.css";
$title = "Home";
require 'partials/header.partial.php';
?>



<?php if ($_SESSION['validated']) { ?>
    <div class="TopItem">
        <!--Upload File-->
        <div id="uploadFile">
            <form action="/upload" method="post" enctype="multipart/form-data">
                <input id="files" type="file" name="file[]" multiple>
                <button id="sub" type="button" onclick="loadedFiles()">Upload</button>

            </form>

        </div>


        <!--File Library-->
        <div id="fileLibrary">
            <h1>Your Files</h1>
            <table class="w3-table Table" style="margin-bottom:0;">
                <tbody>
                <tr class="TopRow">
                        <th class="tdName">
                            File name
                        </th>
                        <th class="tdDate">
                            Upload Date
                        </th>
                        <th class="tdDelete">
                            Delete
                        </th>
                    </tr>
                </tbody>
            </table>

            <div class="TBody" style="margin-top:0;">
            <table class="w3-table Table">
                <tbody>
                    <!--For loop to push out the files-->
                    <?php for ($i = 0; $i < count($data->files); $i++) { ?>
                        <!--List that is repeated out for each file-->
                        
                        <tr class="tr">
                            <td class="tdName">
                                <a class="a" id="<?= $data->files[$i]->ID ?>" href="<?= $web ?>core/download.php?ID=<?= $data->files[$i]->ID ?>&FileName=<?= $data->files[$i]->Title ?>" download>
                                    <?= $data->files[$i]->Title ?>
                                </a>
                            </td>
                            <td class="tdDate">
                            <?= $data->files[$i]->UploadDate ?>
                            </td>
                            <td class="tdDelete">
                                <button class="Delete" onclick="FileDelete(<?= $data->files[$i]->ID ?>)">&times;</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

<?php } else { ?>


<?php } ?>


<?php require 'partials/footer.partial.php'; ?>