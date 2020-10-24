<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <div class="text-center">

                            <img src="../photos/baiust.png" alt="sdv" width="40px" class="round ">
                            <a class="nav-link ml-4" href="#" ><div class="sb-nav-link-icon"></div>
                                <?php echo $_SESSION['name']; ?>
                                </a>
                            </div>

                            <div class="sb-sidenav-menu-heading">Work Space</div>

<!-- ================================Admin======================== -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Manage Admin
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapsePages2" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="add_admin.php">Add Admin</a>
                                    <a class="nav-link" href="admin_list.php">Admin List</a>
                                </nav>
                            </div>

<!-- ================================Student======================== -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Students
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                                        >Student List
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="../student/CSE.php?dept=CSE">Student of CSE</a>
                                            <a class="nav-link" href="../student/EEE.php?dept=EEE">Student of EEE</a>
                                            <a class="nav-link" href="../student/CE.php?dept=CE">Student of CE</a>
                                            <a class="nav-link" href="../student/DBA.php?dept=DBA">Student of DBA</a>
                                            <a class="nav-link" href="../student/ENG.php?dept=ENG">Student of ENG</a>
                                            <a class="nav-link" href="../student/LAW.php?dept=LAW">Student of LAW</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link" href="../student/addStudent.php">Add Student</a>
                                </nav>
                            </div>


<!-- ================================Result======================== -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Final Result
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    
                                    
                                    
                                    <a class="nav-link" href="../result/addResult.php">Add Result</a>
                                    <a class="nav-link" href="../result/result_list.php">Result List</a>
                                    <a class="nav-link" href="../result/addBacklog.php">Add backlog</a>
                                    <a class="nav-link" href="../result/backlogList.php">Backlog List</a>
                                </nav>
                            </div>
                    </div>
                    
                </nav>
            </div>