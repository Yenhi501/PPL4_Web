
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Choose Food</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<?php
session_start();
include_once "php/config.php";
?>
<?php include_once "header.php"; 
?>

<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

<div class="container">
<section class="form-food form signup">
    <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" ;>
    <div class="row">
        <div class="col-lg-3">
            <div class="sidebar">
                <div class="widget widget-school">
                    <div class="widget-title widget-collapse">
                        <h6>School</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#dateposted" role="button" aria-expanded="false" aria-controls="dateposted"> <i class="fas fa-chevron-down"></i> </a>
                    </div>
                    <?php
                        $sql = mysqli_query($conn, "SELECT * FROM options WHERE type = 2");
                        while ($row = mysqli_fetch_assoc($sql)) {
                        echo " <div class='collapse show' id='dateposted'><div class='widget-content'> <div class='form-check'> 
                            <input class='form-check-input' type='checkbox' name='school[]' id='" . $row['id'] . "' value='" . $row['name'] . "'>
                            <label class='form-check-label' for='school'>" . $row['name'] . "</label></div></div></div>";
            }
            ?>
                </div>
                <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Gender</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                    </div>
                    <?php
                         $sql = mysqli_query($conn, "SELECT * FROM options WHERE type = 1");
                         while ($row = mysqli_fetch_assoc($sql)) {
                               echo "<div class='collapse show' id='dateposted'><div class='widget-content'> <div class='form-check'>
                               <input class='form-check-input' type='radio' name='gender' id='" . $row['id'] . "' value='" . $row['name'] . "'>
                               <label class='form-check-label' for='gender'>" . $row['name'] . "</label></div></div></div>";
            }
            ?>
                </div>
            </div>
        </div>
        <div class="error-text"></div>
        <div class="col-lg-9">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="mb-0 text-primary-header"><span class="text-primary">LỰA CHỌN MÓN ĂN BẠN YÊU THÍCH</span></h3>
                </div>
            </div>
            <div class="row">
            <div class="menu__container bd-grid">
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM food ");
                    while ($row = mysqli_fetch_array($sql)) {
                        echo '<div class="menu__content">';
                        echo "<div class='form-check'><input class='form-check-input' type='radio' name='food' id='" . $row['food_id'] . "' value='" . $row['food_id'] . "'>
                      <label class='form-check-label' for='food'>" . $row['food_name'] . "</label></div>";
                    ?>

                        <img src="php/images_food/<?php echo $row['food_img']; ?>" alt="" class="menu__img">
                        <span class="menu__detail"><?php echo $row['Mota']; ?></span>
                        <div class="candidate-list-favourite-time">
                                <a class="candidate-list-favourite" href="#"><i class="far fa-heart icon-like"></i></a>
                            </div>
                    </div>
                    
                <?php
                
                        }
                ?>
        </div>
                <div class="field button">
                    <input style="padding: 0 10px;" type="submit" name="submit" value="Continue to Chat">
                </div>
                    </form>
             </section>
            </div>
        </div>
    </div>
</div>
<script src="javascript/food.js"></script>

<style type="text/css">

body
{
    margin-top: -10px;
    background:#fef7f5;
}

.row{
    margin-left: 4px !important;
    margin-top: -4px !important;
}
.menu__container {
    column-gap: 1rem !important;
}
.widget{

    box-shadow: 0 2px 4px rgba(3, 74, 40, .15) !important;
}

.col-lg-3 {
    margin-left: -140px !important;
    margin-top: -34px !important;
    padding: 0 10px 0 0;
}


.far{
    color: #838383 !important;
    margin-left : 150px !important; 
    margin-top: 14px !important;

}
.far:hover{
    color: red !important;
}
.form-food {
    margin: 0 45px !important;
}
.text-primary{
    color: #ee4957 !important;
    margin: 0 42px !important;
    font-weight : 700 !important;

}
.widget-school{
    margin-top: 130px !important;
}


/* Widget */
.widget .widget-title {
    margin-bottom: 20px;
}
.widget .widget-title h6 {
    margin-bottom: 0;
}
.widget .widget-title a {
    color: #ee4957;
}

.widget .widget-collapse {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-bottom: 0;
}

/* similar-jobs-item */
.similar-jobs-item .job-list {
    border-bottom: 0;
    padding: 0;
    margin-bottom: 15px;
}
.similar-jobs-item .job-list:last-child {
    margin-bottom: 0;
}
.similar-jobs-item .job-list:hover {
    -webkit-box-shadow: none;
    box-shadow: none;
}

/* checkbox */
.widget .widget-content {
    margin-top: 10px;
}
.widget .widget-content .custom-checkbox {
    margin-bottom: 8px;
}
.widget .widget-content .custom-checkbox:last-child {
    margin-bottom: 0px;
}

.widget .custom-checkbox.fulltime-job .custom-control-label:before {
    background-color: #186fc9;
    border: 2px solid #186fc9;
}

.widget .custom-checkbox.fulltime-job .custom-control-input:checked ~ .custom-control-label:before {
    background: #186fc9;
    border-color: #186fc9;
}

.widget .custom-checkbox.parttime-job .custom-control-label:before {
    background-color: #ffc107;
    border: 2px solid #ffc107;
}

.widget .custom-checkbox.parttime-job .custom-control-input:checked ~ .custom-control-label:before {
    background: #ffc107;
    border-color: #ffc107;
}

.widget .custom-checkbox.freelance-job .custom-control-label:before {
    background-color: #53b427;
    border: 2px solid #53b427;
}

.widget .custom-checkbox.freelance-job .custom-control-input:checked ~ .custom-control-label:before {
    background: #53b427;
    border-color: #53b427;
}

.widget .custom-checkbox.temporary-job .custom-control-label:before {
    background-color: #e74c3c;
    border: 2px solid #e74c3c;
}

.widget .custom-checkbox.temporary-job .custom-control-input:checked ~ .custom-control-label:before {
    background: #e74c3c;
    border-color: #e74c3c;
}

.widget ul {
    margin: 0;
}
.widget ul li a:hover {
    color: #21c87a;
}

.widget .company-detail-meta ul {
    display: block;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}
.widget .company-detail-meta ul li {
    margin-right: 15px;
    display: inline-block;
}
.widget .company-detail-meta ul li a {
    color: #646f79;
    font-weight: 600;
    font-size: 12px;
}

.widget .company-detail-meta .share-box li {
    margin-right: 0;
    display: inline-block;
    float: left;
}

.widget .company-detail-meta ul li.linkedin a {
    padding: 15px 20px;
    border: 2px solid #eeeeee;
    display: inline-block;
}
.widget .company-detail-meta ul li.linkedin a i {
    color: #06cdff;
}

.widget .company-address ul li {
    margin-bottom: 10px;
}
.widget .company-address ul li:last-child {
    margin-bottom: 0;
}
.widget .company-address ul li a {
    color: #646f79;
}

.widget .widget-box {
    padding: 20px 15px;
}

.widget .similar-jobs-item .job-list.jobster-list {
    padding: 15px 10px;
    border: 0;
    margin-bottom: 10px;
}

.widget .similar-jobs-item .job-list {
    padding-bottom: 15px;
}

.widget .similar-jobs-item .job-list-logo {
    margin-left: auto;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 60px;
    flex: 0 0 60px;
    height: 60px;
    width: 60px;
}

.widget .similar-jobs-item .job-list-details {
    margin-right: 15px;
    -ms-flex-item-align: center;
    align-self: center;
}
.widget .similar-jobs-item .job-list-details .job-list-title h6 {
    margin-bottom: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.widget .similar-jobs-item .job-list.jobster-list .job-list-company-name {
    color: #21c87a;
}

.widget .docs-content {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    background: #eeeeee;
    padding: 30px;
    border-radius: 3px;
}
.widget .docs-content .docs-text {
    -ms-flex-item-align: center;
    align-self: center;
    color: #646f79;
}
.widget .docs-content span {
    font-weight: 600;
}
.widget .docs-content .docs-icon {
    margin-left: auto;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 38px;
    flex: 0 0 38px;
}

/* Job Detail */
.widget .jobster-company-view ul li {
    border: 1px solid #eeeeee;
    margin-bottom: 20px;
}
.widget .jobster-company-view ul li:last-child {
    margin-bottom: 0;
}
.widget .jobster-company-view ul li span {
    color: #212529;
    -ms-flex-item-align: center;
    align-self: center;
    font-weight: 600;
}

.sidebar .widget {
    border: 1px solid #eeeeee;
    margin-bottom: 30px;
    background-color: #fffdfd !important;
}
.sidebar .widget .widget-title {
    border-bottom: 1px solid #eeeeee;
    padding: 14px 20px;
}

.sidebar .widget .widget-content {
    padding: 10px 20px;
    border-bottom: 2px soild #000;
}
.widget .widget-content {
    margin-top: 10px;
}

</style>

<script type="text/javascript">

</script>
</body>
</html>