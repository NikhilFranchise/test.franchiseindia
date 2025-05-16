<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Franchise India 2022</title>
    <style type="text/css">
        body {
            background-color: #f1f1f1 !important;
        }

        ul.leads-form {
            display: block;
            list-style: none;
            padding-left: 0px;
        }

        ul.leads-form li {
            display: inline-block;
            margin: 0px 5px;
            text-align: left;
        }

        h2.title {
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        .mainFrm {
            width: 900px !important;
            overflow: auto;
            margin: 0 auto !important;
            float: none !important;
            max-width: 90% !important;
            background-color: #ffffff;
            padding: 32px;
        }

        .form-horizontal .control-label {
            text-align: left !important;
        }

        .btn {
            border: #283c7c solid 1px !important;
            color: #283c7c !important;
            border-radius: 4px;
            box-shadow: 0 65px 0 transparent inset;
            font-size: 18px !important;
            font-weight: 100;
            line-height: 1;
            margin: 0 7px;
            max-width: 100%;
            min-width: 154px;
            overflow: hidden;
            padding: 19px 25px 19px !important;
            position: relative;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            transition: color 0.2s ease 0s, border 0.2s ease 0s, background 0.25s ease 0s, box-shadow 0.2s ease 0s;
            vertical-align: middle;
            background: transparent;
        }

        .btn,
        .btn:hover {
            border: #283c7c solid 1px !important;
            color: #fff !important;
            background: #283c7c !important;
        }

        .login-form .form-control {
            background: #f7f7f7 none repeat scroll 0 0;
            border: 1px solid #d4d4d4;
            border-radius: 4px;
            font-size: 14px;
        }

        .mytable {
            background-color: transparent;
            width: 900px;
            max-width: 100%;
            margin: auto;
        }

        .mytable td,
        .mytable th {
            padding: 12px;
        }

        .mytable .btn {
            min-width: 187px !important;
            font-size: 18px !important;
        }

        .main-div {
            background: #ffffff none repeat scroll 0 0;
            border-radius: 2px;
            margin: 10px auto 30px auto;
            min-width: 320px;
            max-width: 77%;
            padding: 7px 20px 18px 21px;
        }

        .main-div h2.title {
            margin-bottom: 6px;
            font-weight: initial;
            font-size: 23px;
        }

        .btn {
            padding: 11px !important;
        }

        .main-div .btn {
            width: 184px !important;
            padding: 11px !important;
            display: block;
            margin: auto;
        }

        .login-form .form-group {
            margin-bottom: 10px;
        }

        .login-form {
            text-align: center;
        }

        .forgot a {
            color: #777777;
            font-size: 14px;
            text-decoration: underline;
        }

        .login-form .btn.btn-primary {
            background: #f0ad4e none repeat scroll 0 0;
            border-color: #f0ad4e;
            color: #ffffff;
            font-size: 14px;
            width: 100%;
            padding: 0;
        }

        .forgot {
            text-align: left;
            margin-bottom: 30px;
        }

        .botto-text {
            color: #ffffff;
            font-size: 14px;
            margin: auto;
        }

        .login-form .btn.btn-primary.reset {
            background: #ff9900 none repeat scroll 0 0;
        }

        .back {
            text-align: left;
            margin-top: 10px;
        }

        .back a {
            color: #444444;
            font-size: 13px;
            text-decoration: none;
        }


        @media screen and (max-width: 767px) {
            .main-div .btn {
                width: 158px !important;
                padding: 9px !important;
                display: block;
                margin: auto;
                font-size: 14px !important;
            }

            ul.leads-form li {
                display: block;
                margin: 15px 5px;
                text-align: left;
            }

            .main-div {
                max-width: 71%;
            }

            .mainFrm {

                margin: 0 auto !important;
                float: none !important;
                max-width: 314px !important;
                overflow: auto;
                background-color: #ffffff;
                padding: 24px 10px;
            }

            .mytable {
                background-color: transparent;
                width: 100%;
                max-width: 100%;
                margin: auto;
                overflow: auto;
                font-size: 12px;
            }

            .mytable td,
            .mytable th {
                padding: 3px;
                width: 100%;
            }

            .mytable .btn {
                min-width: 58px !important;
                font-size: 9px !important;
            }

            .has-feedback {
                padding: 0px 13px !important;
            }

            tbody {
                width: 100%;
            }

            .btn {
                padding: 8px !important;
            }
        }
    </style>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Body Part -->
    <div class="bdy-height gry-bg">
        <div class="container">


            <div class="row">
                <div class="login-form">
                    <div class="main-div">
                        <div class="panel">
                            <h2 class="title">Search</h2>

                        </div>
                        <form id="Login" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                            <div class="form-group">
                                <ul class="leads-form">
                                    <li>
                                        <label for="fihl_id">FIHL ID</label>
                                        <input type="text" name="fihlid" class="form-control" id="inputEmail" placeholder="FIHL ID" required="">
                                    </li>
                                    <li>
                                        <label for="start_date">Start Date</label>
                                        <input type="date" name="start_date" class="form-control" id="start_date" placeholder="Start Date" required="">
                                    </li>
                                    <li>
                                        <label for="start_date">End Date</label>
                                        <input type="date" name="end_date" class="form-control" id="end_date" placeholder="Start Date" required="">
                                    </li>
                                </ul>
                            </div>

                            <div class="forgot">
                            </div>
                            <button type="submit" class="btn btn-primary" name="Submit" value="Login">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row MtextCenter">
                <div class="mainFrm">
                    <?php
                   if((isset($_POST['Submit']) && $_POST['fihlid'] != '') || $_GET['franchisor_id'] != ""){
                        include_once("../configpg/configMINew.php");
						if($_GET['franchisor_id'] != ""){
							$franchisor_id = $_GET['franchisor_id'];
						}else{
							$franchisor_id = $_POST['fihlid'];	
						}                       
					   // $franchisor_id = $_POST['fihlid'];
                        $start_date = $_POST['start_date'];
                        $end_date = $_POST['end_date'];

                        $dateFilter_insta = "";
                        $dateFilter_interest = "";
                        $dateFilter_views = "";

                        // Apply date filters
                        if (!empty($start_date) && !empty($end_date)) {
                            $dateFilter_insta = " AND create_date BETWEEN '$start_date' AND '$end_date'";
                            $dateFilter_interest = " AND visit_date BETWEEN '$start_date' AND '$end_date'";
                            $dateFilter_views = " AND date BETWEEN '$start_date' AND '$end_date'";
                        } elseif (!empty($start_date)) {
                            $dateFilter_insta = " AND create_date >= '$start_date'";
                            $dateFilter_interest = " AND visit_date >= '$start_date'";
                            $dateFilter_views = " AND date >= '$start_date'";
                        } elseif (!empty($end_date)) {
                            $dateFilter_insta = " AND create_date <= '$end_date'";
                            $dateFilter_interest = " AND visit_date <= '$end_date'";
                            $dateFilter_views = " AND date <= '$end_date'";
                        }

                        // SQL queries with date filters
                        $qry = "SELECT count(id) as total FROM express_fran_insta_apply WHERE franchisor_id = '$franchisor_id' $dateFilter_insta";
                        $Selectresult = mysqli_query($link, $qry);
                        $Srow = mysqli_fetch_assoc($Selectresult);

                        $qry1 = "SELECT count(clickID) as totale FROM useractivity WHERE franchisor_id = '$franchisor_id' $dateFilter_interest";
                        $Selectresult1 = mysqli_query($link, $qry1);
                        $Srow1 = mysqli_fetch_assoc($Selectresult1);

                        $qry2 = "SELECT count(id) as totalu FROM unique_visits WHERE franchisor_id = '$franchisor_id' $dateFilter_views";
                        $Selectresult2 = mysqli_query($link, $qry2);
                        $Srow2 = mysqli_fetch_assoc($Selectresult2);

                        $qry3 = "SELECT product_id, start_date, end_date FROM franchisor_payment_history WHERE franchisor_id = '$franchisor_id' AND status = 1";
                        $Selectresult3 = mysqli_query($link, $qry3);
                        $Srow3 = mysqli_fetch_assoc($Selectresult3);

                       $qry4 = "SELECT prod_desc FROM fran_product WHERE product_id =' ".$Srow3['product_id']."'";
                       $Selectresult4 = mysqli_query($link, $qry4);
                       $Srow4 = mysqli_fetch_assoc($Selectresult4);
                        // echo $qry.','. $qry1.','. $qry2;die;
						$qry5 = "SELECT company_name FROM franchisor_business_details WHERE franchisor_id = '$franchisor_id'";
						$Selectresult5 = mysqli_query($link, $qry5);
						$Srow5 = mysqli_fetch_assoc($Selectresult5);

                    ?>
                        <table border="1" class="mytable">
                      
                            <tr>
                                <td width="100%" colspan="2" align="center">
                                    <strong>Views Count for <?php echo $franchisor_id; ?> (<?php echo date('F j, Y', strtotime($start_date)); ?> to <?php echo date('F j, Y', strtotime($end_date)); ?>)</strong>
                                </td>
                            </tr>

                            <tr>
                                <td width="50%"><strong>Company Name</strong></td>
                                <td width="50%"><strong><?php echo $Srow5['company_name']; ?></strong></td>
                            </tr>

                            <tr>
                                <td width="50%"><strong>Insta Apply Count</strong></td>
                                <td width="50%"><strong><?php echo $Srow['total']; ?></strong></td>
                            </tr>
                            <tr>
                                <td width="50%"><strong>Express Interest Count</strong></td>
                                <td width="50%"><strong><?php echo $Srow1['totale']; ?></strong></td>
                            </tr>
                            <tr>
                                <td width="50%"><strong>Views Count</strong></td>
                                <td width="50%"><strong><?php echo $Srow2['totalu']; ?></strong></td>
                            </tr>
                            <tr>
                                <td width="50%"><strong>Date Of Activation</strong></td>
                                <td width="50%"><strong><?php echo $Srow3['start_date']; ?></strong></td>
                            </tr>
                            <tr>
                                <td width="50%"><strong>Expiry Date</strong></td>
                                <td width="50%"><strong><?php echo $Srow3['end_date']; ?></strong></td>
                            </tr>
                            <tr>
                                <td width="50%"><strong>Product Subscribed For</strong></td>
                                <td width="50%"><strong><?php echo $Srow4['prod_desc']; ?></strong></td>
                            </tr>
                        </table>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>

</html>