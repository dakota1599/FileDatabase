<?php
$css = "home.css";
$title = "Home";
require 'partials/header.partial.php';
?>




<?php if ($_SESSION['validated']) { ?>
<div class="TopItem">


    <!--File Library-->
    <div id="fileLibrary">
        <h1>Your Files</h1>
        <input class="w3-input" placeholder="Search" type="text" id="search" onkeyup="search()">
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
                    <?php
                    //Initializes the key array.
                    $_SESSION['key'] = array(count($data->files));
                    for ($i = 0; $i < count($data->files); $i++) { 
                        //For security, each file is given a unique key.
                            $key = rand(100000, 999999);
                            $_SESSION['key'][$data->files[$i]->ID] = $key;
                        ?>
                    <!--List that is repeated out for each file-->

                    <tr class="tr">
                        <td class="tdName">
                            <a class="a item" id="<?= $data->files[$i]->ID ?>"
                                href="<?= $web ?>core/download.php?ID=<?= $data->files[$i]->ID ?>&FileName=<?= $data->files[$i]->Title ?>
                                &Key=<?=$key?>"
                                download title="Click to Download">
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

        <!--Upload File-->
        <div id="uploadFile">
            <form action="/upload" method="post" enctype="multipart/form-data">
                <input class="inputFile" id="files" type="file" name="file[]" multiple>
                <label for="files"></label>
                <button onmouseover="listFiles()" onmouseout="delistFiles()" class="w3-button w3-round-medium button" id="sub" type="button" onclick="loadedFiles()">Upload</button>
                <p id="filesList"></p>
            </form>

        </div>
    </div>
    <!--End of File Library-->

    <div id="ProfileInfo">
        <form action="/updateinfo" method="post" class="w3-form Table">
            <table class="w3-table">
                <tbody>
                    <tr class="TopRow">
                        <th colspan="2">Personal Information</th>
                    </tr>
                    <tr>
                        <td class="infoLabel">
                            <input onfocus="setOriginalVars()" type="text" class="w3-input" id="user" name="user" value="<?= $_SESSION['user'] ?>">
                            <br>
                            <p>Username</p>
                        </td>
                        <td class="infoLabel">
                            <input onfocus="setOriginalVars()" type="text" class="w3-input" id="email" name="email"
                                value="<?= $_SESSION['email'] ?>">
                                <br>
                            <p>Email</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button onclick="updateInfo()" type="button"
                                style="display:block; margin:auto;" class="w3-button w3-round-medium button">Update Info</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p id="error" style="text-align:center;"></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>

<?php } else { ?>


<?php } ?>


<?php require 'partials/footer.partial.php'; ?>