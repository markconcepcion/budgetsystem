<style>

/* -- START -- *//* HEADER STYLE */
    .btn-black {
        border: 1px solid #080808;
        background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
        background: -webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%);
        color: white;
        border-radius:0;
    }
    .btn-black:active{color:black;}
    .header-right .menu-icon { display: block !important; }
    .header-right .menu-icon span{ background: orange; }
    .orange, .dropdown-toggle::after { color: orange !important; }
    .float{ position: absolute; }
/* HEADER STYLE */ /* -- END -- */

/* ======================================================================================================================================= */

/* -- START -- *//* SIDEBAR STYLE */
    h1.sb-head {
        font-size: 15px;
        margin-left: 28%;
        margin-top: 17px;
    }
    
    #sidebar, .left-side-bar { 
        background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
        background: -webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%); 
        min-height: 550px;
    }

    .sidebar-menu .dropdown-toggle, .sidebar-menu .dropdown-toggle .fa{
        color: lightgrey ;
    }

    .sidebar-menu .dropdown-toggle.active, .sidebar-menu .dropdown-toggle.active .fa{
        color: white !important;
        background: orange !important;
    }

    .sidebar-menu .dropdown-toggle:hover, .sidebar-menu .show > .dropdown-toggle {
        background: lightgrey !important;
        color: orange !important;
    }
    .sidebar-menu .dropdown-toggle:hover .fa, .sidebar-menu .show > .dropdown-toggle .fa {
        background: lightgrey !important;
        color: orange !important;
    }
    
    .sb-toggle{
        left: 250px; 
        top: 2%;
        position: absolute;
    }
    .sb-toggle > button.left {
        padding-left: 5px;
        border-radius: 0;
        padding-right: 9px;
    }

    .sb-toggle > button.right {
        padding-left: 9px;
        border-radius: 0;
        padding-right: 5px;
    }
	
/* SIDEBAR STYLE */ /* -- END -- */

/* ======================================================================================================================================= */

/* -- START -- *//* GENERAL STYLE */
    .lbp-input-disabled { border: 0; background: none; text-align: right; }
    .lbp-head, .lbp-head th{ border:0px!important; font-weight: 400;}
    .lbp-head th.title{ min-width:0!important; width:20%!important; }
    .bg-gray{ background:lightgray; }

    .img-approved {
        float: right;
        width: 120px; height: 120px;
    }

    .bar {
        width: 100%; height: 10%;
        border: 1px solid #080808;
        background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
        background: -webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%);
        color: white;
    }

    .logo {
        width: 50px; height: 50px;
        position: absolute;
        border-radius: 50%;
        left: 5%; top: 10px;
    }
    .ntb-bar{
        width: 100%;
        background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
        background: -webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%);
        border-bottom: 5px solid rgb(152, 107, 218) !important;
    }
    .box-shadow{
        border-top: 2px solid black;
        border-bottom: 5px solid #d49f00;
        border-left: 1.25px solid black;
        border-right: 1.25px solid black;
    }

    .nav-link.nl.active.show, .nl.active {
        background-color: rgb(152, 107, 218) !important;
        color: white !important;
    }
    .nav-link.text-blue{ border-radius: 0; border-bottom: 1.5px solid rgb(152, 107, 218) }

    .nav-link.text-blue.active.show, .nav-link.active {
        border-radius: 0; border-bottom: 1.5px solid rgb(152, 107, 218);
        background-color: rgb(152, 107, 218) !important;
        color: white !important;
    }
    .hide { display: none; } .show { display: block;}

    .user-info-dropdown .dropdown-toggle .user-icon { color: orange !important; border: 1px solid orange; }

    .btn-warning { background-color: #ff9900; border-color: #ff9900; border-radius:0; }
    .btn-secondary { background-color: rgb(152, 107, 218); border-color: rgb(152, 107, 218); border-radius:0;}
    .notes:hover { background-color: rgb(152, 107, 218) !important; border-color: rgb(152, 107, 218) !important; }
    a.btn-warning:hover{ color:white!important; }
    .text-blue{ color: rgb(152, 107, 218); }
    .mod_head{ margin-left: 70px; }
    a:hover{ color: #ff9900 !important; }
    .line-input{
        border:0; width: 100%;
        border-bottom:1.1px solid black;
        color: rgba(77, 23, 156, 1);
    }
    .label-input{
        font-size: 15px; margin-bottom:0px; padding-right:0px; padding-top:6px;
    }
/* GENERAL STYLE */ /* -- END -- */

/* ======================================================================================================================================= */

/* -- START -- *//* BODY STYLE */
    .customscroll {
        background-image: url('<?php echo base_url('assets/as.jpg'); ?>');
        background-size: cover;
    }
    .enlarge{ padding-left:0px !important; }
/* BODY STYLE */ /* -- END -- */

/* ======================================================================================================================================= */

/* -- START -- *//* SCROLLBAR STYLE */
    .primaryscroll{
        overflow-y: auto;
        height: 550px;
    }
    .forscroll{
        overflow-y: auto;
        height: 400px;
    }
    #mCSB_2_scrollbar_vertical { opacity: 1; left: 98% }
    #mCSB_2_dragger_vertical > .mCSB_dragger_bar { 
        width: 10px !important;
        border-radius: 0px !important;
        border: 1.5px solid #080808;
        background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
        background: -webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%);
    }
/* SCROLLBAR STYLE */ /* -- END -- */

/* ======================================================================================================================================= */

/* -- START -- *//* SIDEBAR STYLE */
/* SIDEBAR STYLE */ /* -- END -- */

.backbtn {
    border:0;
    border-radius:50%;
    margin-top: -10px !important;
    margin-left: -10px !important;
}
</style>

