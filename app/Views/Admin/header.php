<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nakshatra Aesthetic Beauty Product</title>

    <!-- Favicon -->

    <link rel="shortcut icon" href="<?php echo base_url(); ?>public/assets/images/favicon.ico" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/core/libs.min.css" />

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/vendor/aos/dist/aos.css" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/custom.min.css?v=2.0.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/rtl.min.css" />
    <!-- Font awesome Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/sidebar.css" />


    <link rel="shortcut icon" href="<?=base_url(); ?>public/assets/images/favicon.ico" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/core/libs.min.css" />

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/vendor/aos/dist/aos.css" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/custom.min.css?v=2.0.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/customizer.min.css" />
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/style.css" />


    <!-- RTL Css -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/rtl.min.css" />
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/vendor/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/commanstylefile.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">






</head>

<body class="  ">
    <?php //echo "<pre>";print_r($_SESSION);exit();?>
    <?php
$menu_names = isset($_SESSION['menu_names']) ? explode(', ', $_SESSION['menu_names']) : [];

$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
// print_r($role);die;
?>
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>

    <aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="<?php echo base_url() ?>admindashboard" class="navbar-brand">
                <!--Logo start-->
                <!--logo End-->

                <!--Logo start-->
                <div class="logo-main">
                    <div class="logo-normal">
                        <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                                transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                            <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                                transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                            <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                                transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                            <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                                transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                        </svg>
                    </div>
                    <div class="logo-mini">
                        <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                                transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                            <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                                transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                            <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                                transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                            <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                                transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                        </svg>
                    </div>
                </div>
                <!--logo End-->




                <h4 class="logo-title">Nakshatra</h4>
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>
        </div>
        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
                <!-- Sidebar Menu Start -->
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <?php if (in_array('admindashboard', $menu_names)) : ?>


                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url() ?>admindashboard">
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="icon-20">
                                    <path opacity="0.4"
                                        d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                        fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (in_array('saveSignupTime', $menu_names)) : ?>


                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url() ?>saveSignupTime">
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="icon-20">
                                    <path opacity="0.4"
                                        d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                        fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if (in_array('product_enquiry', $menu_names)) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>product_enquiry">
                        <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Enquiry</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (in_array('order_booking', $menu_names)) : ?>
                            <li class="nav-item">
                                <a class="nav-link " href="<?=base_url(); ?>order_booking">
                                    <i class="icon">
                                <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.75 3.25L4.83 3.61L5.793 15.083C5.87 16.02 6.653 16.739 7.593 16.736H18.502C19.399 16.738 20.16 16.078 20.287 15.19L21.236 8.632C21.342 7.899 20.833 7.219 20.101 7.113C20.037 7.104 5.164 7.099 5.164 7.099"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M14.125 10.7949H16.898" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.15435 20.2026C7.45535 20.2026 7.69835 20.4466 7.69835 20.7466C7.69835 21.0476 7.45535 21.2916 7.15435 21.2916C6.85335 21.2916 6.61035 21.0476 6.61035 20.7466C6.61035 20.4466 6.85335 20.2026 7.15435 20.2026Z"
                                        fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M18.4346 20.2026C18.7356 20.2026 18.9796 20.4466 18.9796 20.7466C18.9796 21.0476 18.7356 21.2916 18.4346 21.2916C18.1336 21.2916 17.8906 21.0476 17.8906 20.7466C17.8906 20.4466 18.1336 20.2026 18.4346 20.2026Z"
                                        fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> H </i>
                                    <span class="item-name">Order Booking</span>
                                </a>
                            </li>
                            <?php endif; ?> 
                            
                            <?php if (in_array('dispatch', $menu_names)) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url(); ?>dispatch">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <i class="sidenav-mini-icon"> D </i>
                                    <span class="item-name">Dispatch</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if (in_array('add_product', $menu_names) || in_array('add_po', $menu_names)  || in_array('Add_stock', $menu_names) || in_array('Transfer_Inventory', $menu_names) ) {  ?>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#Inventory" role="button"
                                    aria-expanded="false" aria-controls="Inventory">
                                    <i class="icon">

                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M13.3051 5.88243V6.06547C12.8144 6.05584 12.3237 6.05584 11.8331 6.05584V5.89206C11.8331 5.22733 11.2737 4.68784 10.6064 4.68784H9.63482C8.52589 4.68784 7.62305 3.80152 7.62305 2.72254C7.62305 2.32755 7.95671 2 8.35906 2C8.77123 2 9.09508 2.32755 9.09508 2.72254C9.09508 3.01155 9.34042 3.24276 9.63482 3.24276H10.6064C12.0882 3.2524 13.2953 4.43736 13.3051 5.88243Z"
                                                fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M15.164 6.08279C15.4791 6.08712 15.7949 6.09145 16.1119 6.09469C19.5172 6.09469 22 8.52241 22 11.875V16.1813C22 19.5339 19.5172 21.9616 16.1119 21.9616C14.7478 21.9905 13.3837 22.0001 12.0098 22.0001C10.6359 22.0001 9.25221 21.9905 7.88813 21.9616C4.48283 21.9616 2 19.5339 2 16.1813V11.875C2 8.52241 4.48283 6.09469 7.89794 6.09469C9.18351 6.07542 10.4985 6.05615 11.8332 6.05615C12.3238 6.05615 12.8145 6.05615 13.3052 6.06579C13.9238 6.06579 14.5425 6.07427 15.164 6.08279ZM10.8518 14.7459H9.82139V15.767C9.82139 16.162 9.48773 16.4896 9.08538 16.4896C8.67321 16.4896 8.34936 16.162 8.34936 15.767V14.7459H7.30913C6.90677 14.7459 6.57311 14.4279 6.57311 14.0233C6.57311 13.6283 6.90677 13.3008 7.30913 13.3008H8.34936V12.2892C8.34936 11.8942 8.67321 11.5667 9.08538 11.5667C9.48773 11.5667 9.82139 11.8942 9.82139 12.2892V13.3008H10.8518C11.2542 13.3008 11.5878 13.6283 11.5878 14.0233C11.5878 14.4279 11.2542 14.7459 10.8518 14.7459ZM15.0226 13.1177H15.1207C15.5231 13.1177 15.8567 12.7998 15.8567 12.3952C15.8567 12.0002 15.5231 11.6727 15.1207 11.6727H15.0226C14.6104 11.6727 14.2866 12.0002 14.2866 12.3952C14.2866 12.7998 14.6104 13.1177 15.0226 13.1177ZM16.7007 16.4318H16.7988C17.2012 16.4318 17.5348 16.1139 17.5348 15.7092C17.5348 15.3143 17.2012 14.9867 16.7988 14.9867H16.7007C16.2885 14.9867 15.9647 15.3143 15.9647 15.7092C15.9647 16.1139 16.2885 16.4318 16.7007 16.4318Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </i>
                                    <span class="item-name">Inventory</span>
                                    <i class="right-icon">
                                        <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </i>
                                </a>
                                <ul class="sub-nav collapse" id="Inventory" data-bs-parent="#sidebar-menu">

                                    <?php if (in_array('add_product', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?=base_url(); ?>add_product">
                                            <i class="icon">
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> H </i>
                                            <span class="item-name">Add Product</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (in_array('add_po', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?=base_url(); ?>add_po">
                                            <i class="icon">
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> D </i>
                                            <span class="item-name">Add PO</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                        
                                    <?php if (in_array('Transfer_Inventory', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?=base_url(); ?>Transfer_Inventory">
                                            <i class="icon">
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> B </i>
                                            <span class="item-name">Transfer Inventory</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (in_array('Add_stock', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?=base_url(); ?>Add_stock">
                                            <i class="icon">
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> B </i>
                                            <span class="item-name">Add Stocks</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                         <?php }?>

                            

                          



                          

                            <?php if (in_array('add_order', $menu_names) || in_array('add_row_Materials', $menu_names)  || in_array('Packaging_Material', $menu_names) || in_array('add_branch', $menu_names) || in_array('Coupon_Code', $menu_names) || in_array('add_cash', $menu_names) || in_array('add_vendor', $menu_names) || in_array('punch_in_out', $menu_names) || in_array('leave_application', $menu_names) || in_array('salary_slip', $menu_names) || in_array('add_courierService', $menu_names) ) {  ?> 
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button"
                                    aria-expanded="false" aria-controls="horizontal-menu">
                                    <i class="icon">

                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="icon-20">
                                            <path opacity="0.4"
                                                d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z"
                                                fill="currentColor"></path>
                                            <path opacity="0.4"
                                                d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </i>
                                    <span class="item-name">Master</span>
                                    <i class="right-icon">
                                        <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </i>
                                </a>
                                <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                                   
                                    <?php if (in_array('add_row_Materials', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?=base_url(); ?>add_row_Materials">
                                            <i class="icon">
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> H </i>
                                            <span class="item-name">Add Raw Materials</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (in_array('Packaging_Material', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?=base_url(); ?>Packaging_Material">
                                            <i class="icon">
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> H </i>
                                            <span class="item-name">Packaging Materials</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (in_array('add_branch', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?=base_url(); ?>add_branch">
                                            <i class="icon">
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> H </i>
                                            <span class="item-name">Add Branch</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (in_array('Coupon_Code', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?=base_url(); ?>Coupon_Code">
                                            <i class="icon">
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> D </i>
                                            <span class="item-name">Coupon Code</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                               
                                 
                                    <?php if (in_array('add_cash', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?=base_url(); ?>add_cash">
                                            <i class="icon">
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> B </i>
                                            <span class="item-name">Add Cash</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if (in_array('add_vendor', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?=base_url(); ?>add_vendor">
                                            <i class="icon">
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> B </i>
                                            <span class="item-name">Add Vendor</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (in_array('punch_in_out', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url(); ?>punch_in_out">
                                            <i class="icon">
                                                <!-- Your SVG icon for Punch In/Out -->
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> P </i>
                                            <span class="item-name">Punch In/Out</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if (in_array('leave_list', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url(); ?>leave_list">
                                            <i class="icon">
                                                <!-- Your SVG icon for Leave Application -->
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> L </i>
                                            <span class="item-name">Leave</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if (in_array('leave_app', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url(); ?>leave_app">
                                            <i class="icon">
                                                <!-- Your SVG icon for Leave Application -->
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> L </i>
                                            <span class="item-name">Leave Application</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if (in_array('salary_slip', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url(); ?>salary_slip">
                                            <i class="icon">
                                                <!-- Your SVG icon for Salary Slip -->
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> S </i>
                                            <span class="item-name">Salary Slip</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php  if (in_array('add_courierService', $menu_names)) : ?>
                            <li class="nav-item">
                                <a class="nav-link " href="<?=base_url(); ?>add_courierService">
                                <i class='fas fa-shipping-fast'></i>
                                    <i class="sidenav-mini-icon"> D </i>
                                    <span class="item-name">Add Courier Service</span>
                                </a>
                            </li>
                            <?php  endif; ?>
                                </ul>
                            </li>
                            <?php  }?>
                         
                            
                            <?php if (in_array('add_employee', $menu_names) || in_array('create_access_level', $menu_names)) {  ?>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-user" role="button" aria-expanded="false" aria-controls="sidebar-user">
                                    <i class="icon">
                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z" fill="currentColor"></path>
                                            <path opacity="0.4" d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z" fill="currentColor"></path>
                                            <path opacity="0.4" d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z" fill="currentColor"></path>
                                            <path d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z" fill="currentColor"></path>
                                            <path opacity="0.4" d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z" fill="currentColor"></path>
                                            <path d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z" fill="currentColor"></path>
                                        </svg>
                                    </i>
                                    <span class="item-name">Settings</span>
                                    <i class="right-icon">
                                        <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </i>
                                </a>
                                <ul class="sub-nav collapse" id="sidebar-user" data-bs-parent="#sidebar-menu">
                                    <?php  if (in_array('add_employee', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?php echo base_url(); ?>add_employee">
                                            <i class="icon svg-icon">
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> U </i>
                                            <span class="item-name">User</span>
                                        </a>
                                    </li>
                                    <?php  endif; ?>
                                    <?php  if (in_array('create_access_level', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?php echo base_url(); ?>create_access_level">
                                            <i class="icon">
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> AL </i>
                                            <span class="item-name">Access Level</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                
                                </ul>
                            </li>
                            <?php } ?>
                   
                            <?php if (in_array('petty_cash', $menu_names) || in_array('bank_transaction', $menu_names)  || in_array('add_daily_expense', $menu_names) || in_array('add_purchase_bill', $menu_names) ) {  ?>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#Accounts" role="button"
                                    aria-expanded="false" aria-controls="Accounts">
                                    <i class="icon">
                                        <!-- SVG icon for Accounts -->
                                        <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </i>
                                    <span class="item-name">Accounts</span>
                                    <i class="right-icon">
                                        <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </i>
                                </a>
                                <ul class="sub-nav collapse" id="Accounts" data-bs-parent="#sidebar-menu">
                                    <?php if (in_array('petty_cash', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url(); ?>petty_cash">
                                            <i class="icon">
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> P </i>
                                            <span class="item-name">Petty Cash</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if (in_array('bank_transaction', $menu_names)) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url(); ?>bank_transaction">
                                            <i class="icon">
                                                <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <!-- Example SVG icon for Bank Transaction -->
                                                    <path d="M3 12h18M3 6h18M3 18h18" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> B </i>
                                            <span class="item-name">Bank Transaction</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (in_array('add_daily_expense', $menu_names)) : ?>
                                        <li class="nav-item">
                                            <a class="nav-link " href="<?=base_url(); ?>add_daily_expense">
                                                <i class="icon">
                                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                        viewBox="0 0 24 24" fill="currentColor">
                                                        <g>
                                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                        </g>
                                                    </svg>
                                                </i>
                                                <i class="sidenav-mini-icon"> H </i>
                                                <span class="item-name">Add Daily Expense</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (in_array('add_purchase_bill', $menu_names)) : ?>
                                        <li class="nav-item">
                                            <a class="nav-link " href="<?=base_url(); ?>add_purchase_bill">
                                                <i class="icon">
                                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                        viewBox="0 0 24 24" fill="currentColor">
                                                        <g>
                                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                        </g>
                                                    </svg>
                                                </i>
                                                <i class="sidenav-mini-icon"> H </i>
                                                <span class="item-name">Add purchase Bill</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <?php } ?>

                    <?php if (in_array('attendance', $menu_names) || in_array('attendance_list', $menu_names) || in_array('sales_reports', $menu_names) ) {  ?>        
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#Accountss" role="button"
                            aria-expanded="false" aria-controls="Accountss">
                            <i class="icon">
                                <!-- SVG icon for Accounts -->
                                <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </i>
                            <span class="item-name">Reports</span>
                            <i class="right-icon">
                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="Accountss" data-bs-parent="#sidebar-menu">
                            <?php if (in_array('sales_reports', $menu_names)) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url(); ?>sales_reports">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> P </i>
                                    <span class="item-name">Sales Reports</span>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if (in_array('attendance', $menu_names)) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url(); ?>attendance">
                                        <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> P </i>
                                        <span class="item-name">Monthly Attendance</span>
                                    </a>
                                </li>
                                <?php endif; ?>

                                <?php if (in_array('attendance_list', $menu_names)) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url(); ?>attendance_list">
                                        <i class="icon">
                                            <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                                viewBox="0 0 24 24" fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> P </i>
                                        <span class="item-name">Attendance List</span>
                                    </a>
                                </li>
                                <?php endif; ?>

                               
                        </ul>
                    </li> 
                    <?php }?>
                </ul>
                <!-- Sidebar Menu End -->
            </div>
        </div>
        <div class="sidebar-footer"></div>
    </aside>
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
                <div class="container-fluid navbar-inner">
                    <a href="../dashboard/index.html" class="navbar-brand">
                        <!--Logo start-->
                        <!--logo End-->

                        <!--Logo start-->
                        <div class="logo-main">
                            <div class="logo-normal">
                                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                                        transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                                    <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                                        transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                                    <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                                        transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                                    <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                                        transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                                </svg>
                            </div>
                            <div class="logo-mini">
                                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                                        transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                                    <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                                        transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                                    <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                                        transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                                    <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                                        transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                                </svg>
                            </div>
                        </div>
                        <!--logo End-->




                        <h4 class="logo-title">Hope UI</h4>
                    </a>
                    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                        <i class="icon">
                            <svg width="20px" class="icon-20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                            </svg>
                        </i>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="mt-2 navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">

                            <li class="nav-item dropdown">
                                <a href="#" class="search-toggle nav-link" id="dropdownMenuButton2"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="bg-primary"></span>
                                </a>
                                <div class="p-0 sub-drop dropdown-menu dropdown-menu-end"
                                    aria-labelledby="dropdownMenuButton2">
                                    <div class="m-0 border-0 shadow-none card">
                                        <div class="p-0 ">
                                            <ul class="p-0 list-group list-group-flush">
                                                <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img
                                                            src="<?=base_url(); ?>public/assets/images/Flag/flag-03.png"
                                                            alt="img-flaf" class="img-fluid me-2"
                                                            style="width: 15px;height: 15px;min-width: 15px;" />Spanish</a>
                                                </li>
                                                <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img
                                                            src="<?=base_url(); ?>public/assets/images/Flag/flag-04.png"
                                                            alt="img-flaf" class="img-fluid me-2"
                                                            style="width: 15px;height: 15px;min-width: 15px;" />Italian</a>
                                                </li>
                                                <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img
                                                            src="<?=base_url(); ?>public/assets/images/Flag/flag-02.png"
                                                            alt="img-flaf" class="img-fluid me-2"
                                                            style="width: 15px;height: 15px;min-width: 15px;" />French</a>
                                                </li>
                                                <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img
                                                            src="<?=base_url(); ?>public/assets/images/Flag/flag-05.png"
                                                            alt="img-flaf" class="img-fluid me-2"
                                                            style="width: 15px;height: 15px;min-width: 15px;" />German</a>
                                                </li>
                                                <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img
                                                            src="<?=base_url(); ?>public/assets/images/Flag/flag-06.png"
                                                            alt="img-flaf" class="img-fluid me-2"
                                                            style="width: 15px;height: 15px;min-width: 15px;" />Japanese</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?=base_url(); ?>public/assets/images/avatars/01.png" alt="User-Profile"
                                        class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="<?=base_url(); ?>public/assets/images/avatars/avtar_1.png"
                                        alt="User-Profile"
                                        class="theme-color-purple-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="<?=base_url(); ?>public/assets/images/avatars/avtar_2.png"
                                        alt="User-Profile"
                                        class="theme-color-blue-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="<?=base_url(); ?>public/assets/images/avatars/avtar_4.png"
                                        alt="User-Profile"
                                        class="theme-color-green-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="<?=base_url(); ?>public/assets/images/avatars/avtar_5.png"
                                        alt="User-Profile"
                                        class="theme-color-yellow-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="<?=base_url(); ?>public/assets/images/avatars/avtar_3.png"
                                        alt="User-Profile"
                                        class="theme-color-pink-img img-fluid avatar avatar-50 avatar-rounded">
                                    <!-- <div class="caption ms-3 d-none d-md-block ">
                                        <h6 class="mb-0 caption-title">Austin Robertson</h6>
                                        <p class="mb-0 caption-sub-title">Marketing Administrator</p>
                                    </div> -->
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <!-- <li><a class="dropdown-item" href="../dashboard/app/user-profile.html">Profile</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="../dashboard/app/user-privacy-setting.html">Privacy Setting</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li> -->
                                    <li><a class="dropdown-item" href="<?=base_url(); ?>logout">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="iq-navbar-header" style="height: 215px;">
                <div class="container-fluid iq-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-wrap d-flex justify-content-between align-items-center">
                                <div>
                                    <h2>Nakshatra Aesthetic Beauty Product</h2>
                                    <!-- <p>We are on a mission to help developers like you build successful projects for
                                        FREE.</p> -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-header-img">
                    <img src="<?=base_url(); ?>public/assets/images/dashboard/top-header.png" alt="header"
                        class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="<?=base_url(); ?>public/assets/images/dashboard/top-header1.png" alt="header"
                        class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="<?=base_url(); ?>public/assets/images/dashboard/top-header2.png" alt="header"
                        class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="<?=base_url(); ?>public/assets/images/dashboard/top-header3.png" alt="header"
                        class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="<?=base_url(); ?>public/assets/images/dashboard/top-header4.png" alt="header"
                        class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="<?=base_url(); ?>public/assets/images/dashboard/top-header5.png" alt="header"
                        class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
                </div>
            </div> <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>