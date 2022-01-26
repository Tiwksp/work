<section class="top-bar animated-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.php">
                        <img src="../images/logo.png" alt="logo" style="width: 20%; height: 20%;">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../backend/member/regis.php">หน้าเเรก
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    สถานที่ท่องเที่ยว
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="listwat.php">วัด</a>

                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ร้านอาหาร
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="listres.php">ร้านอาหาร</a>

                                </div>
                            

                        <?php if ($_SESSION['id'] != '') { ?>
<div>
                            <li class="nav-item dropdown">
                                    <!-- <?php
                                    echo $rs['status'];
                                    ?> -->
                                    
                                    <a class="nav-link dropdown-toggle">
                                    <span style="font-size:14px;">
                                       ยินดีต้อนรับ
                                       
                                            <?php
                                            echo $rs['firstname'] . '  ' . $rs['surname'];
                                            ?>
                                      
                                        <i class="ace-icon fa fa-caret-down"></i>
                                </a>

                                <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                    <li>
                                        <a class="dropdown-item" href="../backend/index.php?page=user">
                                          
                                            ตั้งค่า
                                        </a>
                                    </li>
                                    <div>
                                    <li class="divider"></li>
                                    <li>
                                        <a class="dropdown-item"  href="../backend/member/logout.php">
                                            
                                            ออกจากระบบ
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            </ul>
                        <?php } else { ?>
                            <ul class="nav ace-nav">
                                <li>
                                    <a href="index.php?page=login">
                                        
                                        เข้าสู่ระบบ
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>