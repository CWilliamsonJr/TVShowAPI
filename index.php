<?php
/**
 * Created by PhpStorm.
 * User: Clarence
 * Date: 8/7/2016
 * Time: 11:54 PM
 */
include_once 'includes/includes.inc.php';
$formAction = "'".htmlspecialchars($_SERVER["PHP_SELF"])."'";
?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div class="container-fluid">
    <div class="row col-xs-12">
        <div class="col-md-4 col-sm-12">
            <form class="form-horizontal" method="post" action=<?php echo $formAction ?>  >
                <div class="form-group">
                    <label for="show_search" class="col-sm-3 control-label">Show Search</label>
                    <div class="col-sm-9">
                        <input name="TV Show" value="" type="text" class="form-control" id="show_search" placeholder="Enter in TV Show or IMDB,The TV DB or TV Rage ID">
                    </div>
                </div>
                <div class="form-group">
                    <label for="searchBy" class="col-sm-3 control-label">Search Using</label>
                    <div class="col-sm-9">
                        <select name="Search" id="searchBy">
                            <option value="General Search">General Search</option>
                            <option value="Single Search" selected>Single Search</option>
                            <option value="IMDB">IMDB ID</option>
                            <option value="TV Rage">TV Rage ID</option>
                            <option value="The TV DB">The TV DB ID</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary search-btn btn-block" type="submit">Submit</button>
            </form>

            <?php
            if(empty($_POST['TV_Show'])){
                echo GetSearchInstructions();
            }
            ?>

        </div>
        <div class="col-md-6 col-sm-12">
            <?php
                if(!empty($_POST && !empty($_POST['TV_Show']))){
                    $tvshow = $_POST['TV_Show'];
                    $search = $_POST['Search'];
                    echo GetTVShowInfo($tvshow,$search);
                }
            ?>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
</body>
</html>
