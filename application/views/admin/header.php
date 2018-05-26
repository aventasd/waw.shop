<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon-16x16.png">
    <link rel="manifest" href="/assets/img/site.webmanifest">
    <link rel="mask-icon" href="/assets/img/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/assets/img/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/assets/img/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    
    <title>LegsAndBases Admin</title>
    <link rel="stylesheet" type="text/css" href="/assets/admin/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/assets/admin/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/lib/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/lib/bootstrap-slider/css/bootstrap-slider.min.css"/>
       <link rel="stylesheet" type="text/css" href="/assets/admin/lib/datatables/datatables.net-bs4/css/dataTables.bootstrap4.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/admin/lib/summernote/summernote-bs4.css"/>
    <link rel="stylesheet" href="/assets/admin/css/app.css" type="text/css"/>
  </head>
  <body>
      
      
        <!-- svg - start-->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">

        <symbol id="icon--radio" viewBox="0 0 512 512">
            <circle cx="256" cy="256" r="256"></circle>
        </symbol>

        
         <symbol id="icon--close" viewBox="0 0 512 512">
            <path d="M31.142.026L511.97 480.854l-31.183 31.183L-.04 31.21z"></path>
            <path d="M480.858.026L512.04 31.21 31.214 512.036.03 480.854z"></path>
        </symbol>

        
        <symbol id="icon--reload" viewBox="0 0 512 512">
            <path d="M475.4,268.2c0,121-98.4,219.4-219.4,219.4S36.6,389.2,36.6,268.2S135,48.8,256,48.8 c64.8,0,122.9,28.4,163.1,73.1H304.8v24.4h121.9H451v-24.4V0h-24.4v94.8c-44-43.4-104-70.4-170.7-70.4 c-134.7,0-243.8,109.2-243.8,243.8S121.3,512,256,512s243.8-109.2,243.8-243.8H475.4z"/>
        </symbol>

        <symbol id="icon--check" viewBox="0 0 512 512">
            <polygon points="192.4,439 0,246.7 48.3,198.4 192.5,342.5 463.8,73 512,121.5"/>
        </symbol>

        <symbol id="icon--radio" viewBox="0 0 512 512">
            <circle cx="256" cy="256" r="256"></circle>
        </symbol>

        <symbol id="icon--pin-map" viewBox="0 0 512 512">
            <path d="M382.8 52.5C348.9 18.7 303.9 0 256 0c-47.9 0-92.9 18.7-126.8 52.5-62.7 62.7-70.5 180.6-16.9 252L256 512l143.4-207.2c53.9-71.7 46.1-189.6-16.6-252.3z"/>
        </symbol>

        <symbol id="icon--pin" viewBox="0 0 512 512">
            <path d="M359.4 367c-4.7-.6-8.9 2.8-9.5 7.5-.5 4.7 2.8 8.9 7.5 9.5 89.7 10.6 137.5 39 137.5 55.5 0 23.2-90.9 55.5-238.9 55.5S17.1 462.6 17.1 439.5c0-16.5 47.8-45 137.5-55.5 4.7-.5 8-4.8 7.5-9.5-.6-4.7-4.8-8.1-9.5-7.5C62.8 377.6 0 407.4 0 439.5c0 36 87.9 72.5 256 72.5s256-36.5 256-72.5c0-32.1-62.8-61.9-152.6-72.5z"/>
            <path d="M254.5 467.3l130.9-189.1c49.1-65.5 42-173.1-15.2-230.2-30.9-31-72-48-115.7-48s-84.8 17-115.7 47.9c-57.2 57.2-64.3 164.8-15.4 230l131.1 189.4zm1.5-364.9c32.9 0 59.7 26.8 59.7 59.7s-26.8 59.7-59.7 59.7-59.7-26.8-59.7-59.7 26.8-59.7 59.7-59.7z"/>
        </symbol>

        <symbol id="icon--eye" viewBox="0 0 512 512">
            <path d="M493.2 223.6c-49.4-40.1-132.4-98.5-236.9-100.5h-.6c-104.4 2-187.5 60.3-236.9 100.5C16.4 225.5.3 237.9 0 253.7c-.2 11.2 5 19.4 12.5 26.3 40.3 39 128.2 108.3 243.2 108.8h.6c115.2-.5 203-69.8 243.2-108.8 7.5-6.9 12.7-15.1 12.5-26.3-.3-15.8-16.4-28.2-18.8-30.1zM256 358.8c-56.5-.4-102.2-46.3-102.2-102.9 0-56.6 45.7-102.5 102.2-102.9 56.7.4 102.2 46.3 102.2 102.9S312.7 358.4 256 358.8z"/>
            <path d="M256.3 216h-.6c-21.6.5-39.1 18.2-39.1 40 0 21.7 17.4 39.5 39.1 39.9h.6c21.8-.5 39.1-18.2 39.1-39.9-.1-21.8-17.3-39.5-39.1-40z"/>
        </symbol>
        
        
        <symbol id="icon--smile-1" viewBox="0 0 512 512">
            <circle fill="#FFCC46" cx="256" cy="256" r="256"/>
            <path fill="#833A0A" d="M385.3 382.5c-71.5-73-188.3-72.7-259.4.8-9.1 9.4 5.2 23.7 14.3 14.3 63.6-65.7 166.8-66.1 230.8-.8 9.2 9.4 23.4-4.9 14.3-14.3z"/>
            <circle fill="#833A0A" cx="178.2" cy="167.7" r="40.2"/>
            <circle fill="#833A0A" cx="330.2" cy="167.7" r="40.2"/>
        </symbol>

        <symbol id="icon--smile-2" viewBox="0 0 512 512">
            <circle fill="#FFCC46" cx="256" cy="256" r="256"/>
            <circle fill="#833A0A" cx="178.2" cy="167.7" r="40.2"/>
            <circle fill="#833A0A" cx="330.2" cy="167.7" r="40.2"/>
            <path fill="#833A0A" d="M113.7 352.8h280c13 0 13-20.2 0-20.2h-280c-13 0-13 20.2 0 20.2z"/>
        </symbol>

        <symbol id="icon--smile-3" viewBox="0 0 512 512">
            <circle fill="#FFCC46" cx="256" cy="256" r="256"/>
            <circle fill="#833A0A" cx="178.2" cy="167.7" r="40.2"/>
            <circle fill="#833A0A" cx="330.2" cy="167.7" r="40.2"/>
            <path fill="#833A0A" d="M370.8 342.3c-64 65.2-167.1 64.7-230.6-1-9.1-9.4-23.4 4.9-14.3 14.3 71.1 73.4 187.6 73.8 259.2 1 9.2-9.3-5.1-23.6-14.3-14.3z"/>
        </symbol>

        <symbol id="icon--smile-4" viewBox="0 0 512 512">
            <circle fill="#FFCC46" cx="256" cy="256" r="256"/>
            <path fill="#833A0A" d="M87.9 256.2c0 92.8 75.2 168.1 168.1 168.1 92.8 0 168.1-75.2 168.1-168.1H87.9z"/>
            <circle fill="#833A0A" cx="178.2" cy="167.7" r="40.2"/>
            <circle fill="#833A0A" cx="330.2" cy="167.7" r="40.2"/>
        </symbol>
        
        
         <symbol id="icon--smile-4-bw" viewBox="0 0 512 512">
            <circle fill="#FFFfff" cx="256" cy="256" r="256" stroke="#211f56" stroke-width="22"/>
            <path fill="#211f56" d="M87.9 256.2c0 92.8 75.2 168.1 168.1 168.1 92.8 0 168.1-75.2 168.1-168.1H87.9z"/>
            <circle fill="#211f56" cx="178.2" cy="167.7" r="40.2"/>
            <circle fill="#211f56" cx="330.2" cy="167.7" r="40.2"/>
        </symbol>
        
        <symbol id="icon--play" viewBox="0 0 512 512">
            <path d="M256 0C114.8 0 0 114.8 0 256s114.8 256 256 256 256-114.8 256-256S397.2 0 256 0zm132.8 263L201.1 391c-1.4 1-3.1 1.5-4.8 1.5-1.4 0-2.7-.3-4-1-2.8-1.5-4.5-4.4-4.5-7.5V128c0-3.2 1.7-6.1 4.5-7.5 2.8-1.5 6.2-1.3 8.8.5l187.7 128c2.3 1.6 3.7 4.2 3.7 7s-1.4 5.5-3.7 7z"/>
        </symbol>

        <symbol id="icon--search" viewBox="0 0 512 512">
            <path d="M495.6,466.4L373.8,339.6c31.3-37.2,48.5-84.1,48.5-132.9C422.3,92.7,329.5,0,215.6,0S8.8,92.7,8.8,206.7 s92.7,206.7,206.7,206.7c42.8,0,83.6-12.9,118.4-37.4l122.8,127.7c5.1,5.3,12,8.3,19.4,8.3c7,0,13.6-2.7,18.7-7.5 C505.6,494.2,506,477.1,495.6,466.4z M215.6,53.9c84.3,0,152.8,68.5,152.8,152.8s-68.5,152.8-152.8,152.8S62.8,291,62.8,206.7 S131.3,53.9,215.6,53.9z"/>
        </symbol>

        <symbol id="icon--heart" viewBox="0 0 512 512">
            <path d="M511.8,182.1c-1.9-36.1-17.2-70-43-95.4c-26.2-25.8-60.4-40-96.3-40c-53.8,0-91.9,41.5-112.3,63.9 c-1.2,1.3-2.4,2.6-3.6,4c-0.7-0.7-1.3-1.5-1.9-2.2c-18.7-21.3-57.6-65.6-114.9-65.6c-35.9,0-70.1,14.2-96.3,40 c-25.8,25.4-41.1,59.3-43,95.4c-1.9,35.9,7.2,67,29.6,100.9c20,30.4,72.2,78.5,110.8,110.5c39.7,32.8,91.9,72,115.6,72 c24,0,76.1-39.1,115.5-71.8c38.3-31.8,90.2-79.9,110.4-110.6C497.3,260.1,514.2,227.9,511.8,182.1z M456.5,266 c-14.7,22.4-56.1,63.7-103.1,102.8c-56,46.6-89.2,65-97.1,65.8c-7.9-0.8-41.2-19.4-97.5-66.1C111.5,329.2,70.1,288.1,55.5,266 C37,238,29.5,212.6,31,183.7c3.1-58.6,51.8-106.3,108.6-106.3c43.3,0,74.8,35.9,91.8,55.1c9.9,11.3,15.4,17.6,24.6,17.6 c9.5,0,15.6-6.7,26.8-18.8c18.5-20.2,49.4-53.9,89.6-53.9c56.7,0,105.4,47.7,108.6,106.3C482.6,212.9,475.2,237.5,456.5,266z"/>
        </symbol>

        <symbol id="icon--cart" viewBox="0 0 512 512">
            <path d="M467.6,490.6l-31.2-347c-0.9-9.5-8.8-16.7-18.3-16.7h-64.2v-29C353.9,43.9,310,0,256,0 c-54,0-97.9,43.9-97.9,97.9v29H93.8c-9.5,0-17.5,7.3-18.3,16.7L44.2,492c-0.5,5.1,1.3,10.2,4.7,14c3.5,3.8,8.4,6,13.6,6h387 c0,0,0,0,0,0c10.2,0,18.4-8.2,18.4-18.4C467.9,492.6,467.8,491.6,467.6,490.6z M194.8,97.9c0-33.7,27.4-61.2,61.2-61.2 c33.7,0,61.2,27.4,61.2,61.2v29H194.8V97.9z M82.6,475.2l28-311.6h47.5v32.9c0,10.1,8.2,18.4,18.4,18.4c10.2,0,18.4-8.2,18.4-18.4 v-32.9h122.4v32.9c0,10.1,8.2,18.4,18.4,18.4s18.4-8.2,18.4-18.4v-32.9h47.4l28,311.6L82.6,475.2L82.6,475.2z"/>
        </symbol>

        <symbol id="icon--arrow-up" viewBox="0 0 512 512">
            <path d="M274.3,122.9c-9.9-9.9-26.6-9.9-36.5,0L7.6,352.5c-10.1,10.1-10.1,26.4,0,36.5 C17.6,399,34,399,44.1,389L256,177.6L467.9,389c10.1,10.1,26.4,10.1,36.5,0c10.1-10.1,10.1-26.4,0-36.5L274.3,122.9z"/>
        </symbol>

        <symbol id="icon--arrow-down" viewBox="0 0 512 512">
            <path d="M467.9,122.6L256,334.6l-211.9-212c-10.1-10.1-26.4-10.1-36.6,0 c-10.1,10.1-10.1,26.5,0,36.6l230.2,230.3l0,0l0,0c10.1,10.1,26.4,10.1,36.5,0l230.2-230.3c10.1-10.1,10.1-26.5,0-36.6 C494.4,112.5,478,112.5,467.9,122.6z"/>
        </symbol>

        <symbol id="icon--arrow-left" viewBox="0 0 512 512">
            <path d="M122.5,274.3l230.2,230.2c10.1,10.1,26.5,10.1,36.6,0c10.1-10.1,10.1-26.4,0-36.5 L177.4,256l212-211.9c10.1-10.1,10.1-26.4,0-36.5c-10.1-10.1-26.5-10.1-36.6,0L122.5,237.7C112.6,247.7,112.6,264.3,122.5,274.3z"/>
        </symbol>

        <symbol id="icon--arrow-right" viewBox="0 0 512 512">
            <path d="M389.5,237.7L159.2,7.6c-10.1-10.1-26.5-10.1-36.6,0c-10.1,10.1-10.1,26.4,0,36.5 l212,211.9l-212,211.9c-10.1,10.1-10.1,26.4,0,36.5c10.1,10.1,26.5,10.1,36.6,0l230.2-230.2C399.4,264.3,399.4,247.7,389.5,237.7z"/>
        </symbol>

        <symbol id="icon--twitter" viewBox="0 0 512 512">
            <path d="M512,97.2c-18.8,8.4-39.1,14-60.3,16.5c21.7-13,38.3-33.6,46.2-58.1c-20.3,12-42.8,20.8-66.7,25.5 C412,60.7,384.7,48,354.5,48c-58,0-105,47-105,105c0,8.2,0.9,16.3,2.7,23.9c-87.3-4.4-164.7-46.2-216.5-109.8 c-9,15.5-14.2,33.6-14.2,52.8c0,36.4,18.5,68.6,46.7,87.4c-17.2-0.5-33.4-5.3-47.6-13.1c0,0.4,0,0.9,0,1.3 c0,50.9,36.2,93.3,84.3,103c-8.8,2.4-18.1,3.7-27.7,3.7c-6.8,0-13.3-0.7-19.8-1.9c13.4,41.7,52.2,72.1,98.1,72.9 c-35.9,28.2-81.2,45-130.5,45c-8.5,0-16.8-0.5-25.1-1.5C46.5,446.7,101.7,464,161,464c193.2,0,298.9-160.1,298.9-298.9 c0-4.6-0.1-9.1-0.3-13.6C480.1,136.8,497.9,118.3,512,97.2z"/>
        </symbol>

        <symbol id="icon--vk" viewBox="0 0 512 512">
            <path d="M440.6,295.4c17,16.6,34.9,32.2,50.1,50.4c6.7,8.1,13.1,16.5,18,25.9 c6.9,13.4,0.7,28.1-11.3,28.9l-74.6,0c-19.2,1.6-34.6-6.1-47.5-19.3c-10.3-10.5-19.9-21.7-29.8-32.6c-4.1-4.4-8.3-8.6-13.4-11.9 c-10.2-6.6-19-4.6-24.8,6c-5.9,10.8-7.3,22.8-7.9,34.8c-0.8,17.6-6.1,22.2-23.8,23c-37.7,1.8-73.5-3.9-106.7-22.9 c-29.3-16.8-52-40.4-71.8-67.2c-38.5-52.2-68-109.5-94.5-168.5c-6-13.3-1.6-20.4,13.1-20.7c24.3-0.5,48.7-0.4,73,0 c9.9,0.1,16.4,5.8,20.3,15.2c13.2,32.4,29.3,63.2,49.5,91.7c5.4,7.6,10.9,15.2,18.7,20.5c8.6,5.9,15.2,4,19.3-5.7 c2.6-6.1,3.7-12.7,4.3-19.2c1.9-22.5,2.2-45-1.2-67.4c-2.1-14-10-23.1-23.9-25.7c-7.1-1.4-6.1-4-2.6-8.1c6-7,11.6-11.4,22.9-11.4 h84.3c13.3,2.6,16.2,8.6,18,21.9l0.1,93.6c-0.1,5.2,2.6,20.5,11.9,23.9c7.5,2.4,12.4-3.5,16.8-8.3c20.2-21.4,34.6-46.7,47.5-73 c5.7-11.5,10.6-23.5,15.4-35.5c3.5-8.9,9.1-13.2,19.1-13L490,121c2.4,0,4.8,0,7.2,0.4c13.7,2.3,17.4,8.2,13.2,21.6 c-6.7,20.9-19.6,38.4-32.3,55.9c-13.5,18.7-28,36.8-41.4,55.6C424.4,271.8,425.3,280.4,440.6,295.4L440.6,295.4z"/>
        </symbol>

        <symbol id="icon--facebook" viewBox="0 0 512 512">
            <path d="M460.8,0H51.2C23,0,0,23,0,51.2v409.6C0,489,23,512,51.2,512h409.6c28.2,0,51.2-23,51.2-51.2V51.2 C512,23,489,0,460.8,0z M435.2,51.2V128H384c-15.4,0-25.6,10.2-25.6,25.6v51.2h76.8v76.8h-76.8v179.2h-76.8V281.6h-51.2v-76.8 h51.2v-64c0-48.6,41-89.6,89.6-89.6H435.2z"/>
        </symbol>

        <symbol id="icon--instagram" viewBox="0 0 512 512">
            <path d="M370.7,0H141.3C63.4,0,0,63.4,0,141.3v229.4C0,448.6,63.4,512,141.3,512h229.4 c77.9,0,141.3-63.4,141.3-141.3V141.3C512,63.4,448.6,0,370.7,0z M466.6,370.7c0,52.9-43,95.9-95.9,95.9H141.3 c-52.9,0-95.9-43-95.9-95.9V141.3c0-52.9,43-95.9,95.9-95.9h229.4c52.9,0,95.9,43,95.9,95.9L466.6,370.7L466.6,370.7z"/>
            <path d="M256,124.1c-72.7,0-131.9,59.2-131.9,131.9c0,72.7,59.2,131.9,131.9,131.9S387.9,328.8,387.9,256 C387.9,183.3,328.7,124.1,256,124.1z M256,342.5c-47.7,0-86.5-38.8-86.5-86.5c0-47.7,38.8-86.5,86.5-86.5s86.5,38.8,86.5,86.5 C342.5,303.7,303.7,342.5,256,342.5z"/>
            <path d="M393.5,85.6c-8.8,0-17.4,3.5-23.5,9.8c-6.2,6.2-9.8,14.8-9.8,23.6c0,8.8,3.6,17.4,9.8,23.6 c6.2,6.2,14.8,9.8,23.5,9.8c8.8,0,17.4-3.6,23.6-9.8c6.2-6.2,9.8-14.8,9.8-23.6c0-8.8-3.5-17.4-9.8-23.6 C410.8,89.1,402.2,85.6,393.5,85.6z"/>
        </symbol>

        <symbol id="icon--google" viewBox="20 10 13 14">
            <path d="M27,16 L33,16 C32.9654489,16.4045159 33,16.7934009 33,17 C33,18.4826455 32.7379871,19.6599341 32,21 C31.6899199,21.731993 30.9427513,22.5416637 30,23 C29.0020992,23.7083363 27.8892643,24 27,24 C25.7297851,24 24.8688856,23.8161911 24,23 C23.23344,23.0809443 22.5280207,22.5842045 22,22 C21.3417468,21.3324621 20.8709873,20.588112 21,20 C20.1741954,18.8624089 20,17.9539978 20,17 C20,16.0460022 20.1741954,15.1375911 21,14 C20.8709873,13.411888 21.3417468,12.6675379 22,12 C22.5280207,11.4157955 23.23344,10.9190557 24,11 C24.8688856,10.1838089 25.7297851,10 27,10 C28.3614704,10 29.8442906,10.610671 31,12 L29,14 C28.5687672,12.9409686 27.6877129,12.5794271 27,13 C25.8910262,12.5794271 25.2043221,12.7769077 25,13 C23.9431862,13.5668423 23.4436342,14.1030782 23,15 C22.7065319,15.4581197 22.5222591,16.1979127 23,17 C22.5222591,17.8020873 22.7065319,18.5418803 23,19 C23.4436342,19.8969218 23.9431862,20.4331577 25,21 C25.2043221,21.2230923 25.8910262,21.4205729 27,21 C27.1348862,21.4205729 27.5955682,21.347657 28,21 C28.4363255,21.0559889 28.781837,20.873699 29,21 C29.3231464,20.4361968 29.5592459,20.1870674 30,20 C29.9623487,19.6280368 30.1106308,19.3637165 30,19 C30.3006649,18.8654501 30.3654483,18.6284733 30,18 L27,18 L27,16 Z" id="icon-google" stroke="none" fill="#5A5981" fill-rule="evenodd"></path>
        </symbol>

     <symbol id="icon--whatsup" viewBox="0 0 308 308">
            <path id="XMLID_469_" d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156   c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687   c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887   c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153   c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348   c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802   c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922   c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0   c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458   C233.168,179.508,230.845,178.393,227.904,176.981z" stroke="none" fill="#5A5981" fill-rule="evenodd"/>
            <path id="XMLID_470_" d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716   c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396   c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z    M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188   l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677   c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867   C276.546,215.678,222.799,268.994,156.734,268.994z" fill="#5A5981" fill-rule="evenodd"/>
        </symbol>

        <symbol id="icon--telegram" viewBox="0 0 26.649 26.649">
            <path d="M26.157,1.238c-0.434-0.567-1.107-0.892-1.847-0.892c-0.478,0-0.973,0.133-1.472,0.395L1.593,11.88   c-1.51,0.793-1.615,1.987-1.59,2.463c0.024,0.479,0.255,1.654,1.839,2.283L4.557,17.7c0.515,0.204,1.091,0.309,1.711,0.309   c0.098,0,0.192-0.013,0.289-0.018c-0.037,0.048-0.082,0.085-0.116,0.135c-0.506,0.757-0.531,1.783-0.073,2.888   c0.007,0.019,0.014,0.035,0.021,0.051c0.803,1.779,1.696,3.787,1.804,4.066c0.266,0.694,0.944,1.172,1.688,1.172   c1.146,0,1.486-0.552,3.361-3.604c0.146-0.224,0.471-0.744,0.526-1.406c0.219,0.089,0.425,0.171,0.601,0.242l3.008,1.226   c0.603,0.246,1.131,0.463,1.409,0.578c0.086,0.053,0.177,0.098,0.272,0.137c0.212,0.084,0.438,0.127,0.665,0.127   c1.368,0,1.696-1.185,1.872-1.82c0.087-0.314,0.207-0.749,0.336-1.229l4.588-16.858C26.865,2.423,26.44,1.61,26.157,1.238z    M11.727,21.739c0,0-1.702,2.771-1.847,2.771c-0.004,0-0.006-0.002-0.008-0.006c-0.167-0.449-1.849-4.176-1.849-4.176   c-0.31-0.747-0.254-1.387,0.279-1.387c0.117,0,0.257,0.031,0.421,0.099l1.306,0.679c0.218,0.149,0.456,0.278,0.718,0.381   l0.066,0.025l0.123,0.062C11.945,20.721,12.266,20.914,11.727,21.739z M24.789,3.224l-4.586,16.858   c-0.259,0.95-0.475,1.727-0.479,1.727c-0.004-0.002-0.009-0.02-0.009-0.023c0-0.006-0.748-0.312-1.662-0.686l-3.01-1.226   c-0.914-0.37-2.413-0.969-3.332-1.323l-0.152-0.061l-0.562-0.292c-0.557-0.427-0.606-1.131-0.046-1.728l9.312-9.971   c0.374-0.399,0.515-0.605,0.434-0.605c-0.064,0-0.271,0.133-0.617,0.404L8.298,15.592c-0.514,0.401-1.295,0.625-2.029,0.625   c-0.376,0-0.741-0.06-1.052-0.183l-2.713-1.073c-0.917-0.363-0.952-1.033-0.079-1.493L23.672,2.327   c0.245-0.128,0.46-0.188,0.638-0.188C24.767,2.139,24.975,2.539,24.789,3.224z" fill="#5A5981" fill-rule="evenodd"/>
        </symbol>

        <symbol id="icon--viber" viewBox="0 0 226.978 226.978">
            <path d="M199.569,25.393C181.627,7.803,152.62-0.72,113.339,0.048C73.731,0.827,47.255,7.779,30.018,21.927   C13.352,35.605,5.59,55.62,5.59,84.915v29.898c0,34.584,18.532,72.605,53.951,78.358c4.089,0.669,7.941-2.111,8.605-6.201   c0.664-4.088-2.112-7.941-6.201-8.605c-26.861-4.363-41.355-36-41.355-63.552V84.915c0-42.006,15.565-68.347,93.043-69.871   c35.125-0.696,60.477,6.395,75.433,21.059c11.655,11.429,17.321,27.395,17.321,48.812v29.898c0,45.274-20.321,65.243-72.441,71.123   H96.988c-1.989,0-3.897,0.79-5.303,2.197l-26.041,26.041c-2.929,2.929-2.929,7.678,0,10.607c1.464,1.464,3.384,2.197,5.303,2.197   c1.919,0,3.839-0.732,5.303-2.197l23.845-23.845h34.27c0.276,0,0.553-0.015,0.828-0.046c29.828-3.313,50.254-11.076,64.279-24.432   c14.747-14.044,21.916-34.208,21.916-61.646V84.915C221.388,59.616,214.047,39.59,199.569,25.393z" fill="#5A5981" fill-rule="evenodd"/>
            <path d="M118.17,48.988c0.001,0,0.001,0,0.003,0c12.085,0,23.447,4.707,31.993,13.253c8.547,8.547,13.254,19.911,13.253,31.998   c0,4.142,3.357,7.5,7.499,7.5c0.001,0,0.001,0,0.001,0c4.142,0,7.5-3.357,7.5-7.499c0.001-16.094-6.266-31.225-17.646-42.605   c-11.379-11.38-26.507-17.646-42.6-17.646c-0.001,0-0.004,0-0.005,0c-4.142,0-7.499,3.358-7.499,7.5   C110.67,45.63,114.028,48.988,118.17,48.988z" fill="#5A5981" fill-rule="evenodd"/>
            <path d="M118.168,75.362c10.408,0.002,18.877,8.47,18.878,18.877c0.001,4.142,3.358,7.5,7.501,7.499c4.143,0,7.5-3.359,7.499-7.501   c-0.003-18.676-15.199-33.872-33.876-33.875h-0.001c-4.142,0-7.499,3.357-7.5,7.499C110.669,72.003,114.026,75.362,118.168,75.362z   " fill="#5A5981" fill-rule="evenodd"/>
            <path d="M84.538,88.213c-3.419,2.338-4.296,7.005-1.959,10.424c2.337,3.419,7.005,4.295,10.424,1.958   c2.689-1.838,8.987-6.144,8.545-14.752c-0.28-5.152-4.927-12.508-8.776-17.772C87.142,60.369,82.29,55.73,78.381,54.292   c-3.65-1.359-7.467-1.388-11.353-0.084c-8.049,2.712-13.893,7.613-16.899,14.173c-2.927,6.386-2.862,13.725,0.189,21.228   c7.206,17.678,17.294,33.155,30.051,46.067c12.845,12.689,28.321,22.777,46.006,29.987c3.827,1.557,7.613,2.336,11.252,2.336   c3.49,0,6.845-0.716,9.971-2.149c6.56-3.007,11.46-8.85,14.175-16.909c1.3-3.877,1.271-7.692-0.077-11.317   c-1.448-3.937-6.088-8.788-13.789-14.418c-5.265-3.849-12.621-8.496-17.793-8.777c-8.59-0.432-12.892,5.855-14.73,8.544   c-2.338,3.419-1.463,8.086,1.956,10.425c3.42,2.339,8.086,1.463,10.425-1.956c0.816-1.193,1.282-1.735,1.549-1.972   c4.21,1.349,16.215,10.169,18.376,13.549c0.053,0.216,0.065,0.545-0.135,1.144c-0.946,2.809-2.791,6.486-6.206,8.052   c-3.199,1.464-6.834,0.566-9.316-0.443c-15.847-6.461-29.682-15.466-41.058-26.703c-11.301-11.439-20.306-25.274-26.763-41.115   c-1.012-2.488-1.911-6.125-0.446-9.321c1.565-3.415,5.243-5.261,8.043-6.205c0.598-0.2,0.927-0.189,1.155-0.134   c3.381,2.165,12.196,14.163,13.546,18.374C86.272,86.931,85.731,87.398,84.538,88.213z" fill="#5A5981" fill-rule="evenodd"/>
        </symbol>

        <symbol id="icon--reload" viewBox="0 0 512 512">
            <path d="M475.4,268.2c0,121-98.4,219.4-219.4,219.4S36.6,389.2,36.6,268.2S135,48.8,256,48.8 c64.8,0,122.9,28.4,163.1,73.1H304.8v24.4h121.9H451v-24.4V0h-24.4v94.8c-44-43.4-104-70.4-170.7-70.4 c-134.7,0-243.8,109.2-243.8,243.8S121.3,512,256,512s243.8-109.2,243.8-243.8H475.4z"/>
        </symbol>

        <symbol id="icon--check" viewBox="0 0 512 512">
            <polygon points="192.4,439 0,246.7 48.3,198.4 192.5,342.5 463.8,73 512,121.5"/>
        </symbol>

        <symbol id="icon--show-pass" viewBox="332 49 28 16">
            <g id="Bitmap" stroke="none" fill="none" opacity="0.5">
                <image x="332" y="49" width="28" height="16" xlink:href="data:image/png;base64,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"></image>
                <use fill="#211F56" fill-rule="evenodd" xlink:href="#rect-1"></use>
            </g>
        </symbol>
        <symbol id="icon--edit" viewBox="0 0 512 512">
            <path d="M27.9 380.1l101.4 101.4-2.5 5L.1 512l25.3-126.7 2.5-5.2zm18-18.6l102.2 102.2 286.8-286.8L332.7 74.7 45.9 361.5zM496.7 45.6l-30.5-30.3C445.9-5 415.6-5 395.3 15.3l-43.1 43.1 101.4 101.4 43.1-43.1c20.3-20.4 20.3-53.4 0-71.1z"></path>
        </symbol>
        
        <symbol id="icon--play" viewBox="0 0 512 512">
            <path d="M256 0C114.8 0 0 114.8 0 256s114.8 256 256 256 256-114.8 256-256S397.2 0 256 0zm132.8 263L201.1 391c-1.4 1-3.1 1.5-4.8 1.5-1.4 0-2.7-.3-4-1-2.8-1.5-4.5-4.4-4.5-7.5V128c0-3.2 1.7-6.1 4.5-7.5 2.8-1.5 6.2-1.3 8.8.5l187.7 128c2.3 1.6 3.7 4.2 3.7 7s-1.4 5.5-3.7 7z"/>
        </symbol>
        
        <symbol id="icon--trash" viewBox="0 0 512 512">
            <path d="M487.7 88.3c-2-2-4.6-3-7.7-3H377l-23.3-55.7c-3.3-8.2-9.3-15.2-18-21C327 2.9 318.2 0 309.3 0H202.7c-8.9 0-17.7 2.9-26.3 8.7-8.7 5.8-14.7 12.8-18 21L135 85.3H32c-3.1 0-5.7 1-7.7 3s-3 4.6-3 7.7v21.3c0 3.1 1 5.7 3 7.7s4.6 3 7.7 3h32v317.3c0 18.5 5.2 34.2 15.7 47.2 10.4 13 23 19.5 37.7 19.5h277.3c14.7 0 27.2-6.7 37.7-20.2 10.4-13.5 15.7-29.4 15.7-47.8V128h32c3.1 0 5.7-1 7.7-3s3-4.6 3-7.7V96c-.1-3.1-1.1-5.7-3.1-7.7zm-290-42c1.6-2 3.4-3.2 5.7-3.7H309c2.2.4 4.1 1.7 5.7 3.7l16 39H181.3l16.4-39zM405.3 444c0 4.9-.8 9.4-2.3 13.5-1.6 4.1-3.2 7.1-4.8 9-1.7 1.9-2.8 2.8-3.5 2.8H117.3c-.7 0-1.8-.9-3.5-2.8s-3.3-4.9-4.8-9c-1.6-4.1-2.3-8.6-2.3-13.5V128h298.7l-.1 316z"/>
            <path d="M160 405.3h21.3c3.1 0 5.7-1 7.7-3s3-4.6 3-7.7v-192c0-3.1-1-5.7-3-7.7s-4.6-3-7.7-3H160c-3.1 0-5.7 1-7.7 3s-3 4.6-3 7.7v192c0 3.1 1 5.7 3 7.7s4.6 3 7.7 3zM245.3 405.3h21.3c3.1 0 5.7-1 7.7-3s3-4.6 3-7.7v-192c0-3.1-1-5.7-3-7.7s-4.6-3-7.7-3h-21.3c-3.1 0-5.7 1-7.7 3s-3 4.6-3 7.7v192c0 3.1 1 5.7 3 7.7 2.1 2 4.6 3 7.7 3zM330.7 405.3H352c3.1 0 5.7-1 7.7-3s3-4.6 3-7.7v-192c0-3.1-1-5.7-3-7.7s-4.6-3-7.7-3h-21.3c-3.1 0-5.7 1-7.7 3s-3 4.6-3 7.7v192c0 3.1 1 5.7 3 7.7s4.6 3 7.7 3z"/>
        </symbol>
        
             <symbol id="icon--plus" viewBox="0 0 512 512">
            <path d="M0 243.1h512V269H0z"></path>
            <path d="M243.1 0H269v512h-25.9z"></path>
        </symbol>
        
        
    </svg>
    <!-- svg - end-->

    
    
    <div class="be-wrapper">
      <nav class="navbar navbar-expand fixed-top be-top-header">
        <div class="container-fluid">
          <div class="be-navbar-header"><a href="/" class="navbar-brand"></a>
          </div>
          <div class="be-right-navbar">
            <ul class="nav navbar-nav float-right be-user-nav">
              <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><img style="width: 30px;" src="/assets/img/user.svg" alt="Avatar"><span class="user-name"><?=$this->header_one->getUserName()?></span></a>
                <div role="menu" class="dropdown-menu">     
                  <div class="user-info">
                    <div class="user-name"><?=$this->header_one->getUserName()?></div>
                    <div class="user-position online">Available</div>
                  </div><a href="pages-profile.html" class="dropdown-item">
                      <span class="icon mdi mdi-settings"></span> Account Settings</a>
                  
                  <a   class="dropdown-item logOutCabinet"><span class="icon mdi mdi-power"></span> Logout</a>
                </div>
              </li>
            </ul>
            <div class="page-title" style="display: none"><span><?=$page['h2_title']?></span></div>
            <ul class="nav navbar-nav float-right be-icons-nav">
              <li style="display: none" class="nav-item dropdown"><a href="#" role="button" aria-expanded="false" class="nav-link be-toggle-right-sidebar"><span class="icon mdi mdi-settings"></span></a></li>
              <li style="display: none" class="nav-item dropdown" ><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
                <ul class="dropdown-menu be-notifications">
                  <li>
                    <div class="title">Notifications<span class="badge badge-pill">3</span></div>
                    <div class="list">
                      <div class="be-scroller">
                        <div class="content">
                          <ul>
                            <li class="notification notification-unread"><a href="#">
                                <div class="image"><img src="/assets/admin/img/avatar2.png" alt="Avatar"></div>
                                <div class="notification-info">
                                  <div class="text"><span class="user-name">Jessica Caruso</span> accepted your invitation to join the team.</div><span class="date">2 min ago</span>
                                </div></a></li>
                            <li class="notification"><a href="#">
                                <div class="image"><img src="/assets/admin/img/avatar3.png" alt="Avatar"></div>
                                <div class="notification-info">
                                  <div class="text"><span class="user-name">Joel King</span> is now following you</div><span class="date">2 days ago</span>
                                </div></a></li>
                            <li class="notification"><a href="#">
                                <div class="image"><img src="/assets/admin/img/avatar4.png" alt="Avatar"></div>
                                <div class="notification-info">
                                  <div class="text"><span class="user-name">John Doe</span> is watching your main repository</div><span class="date">2 days ago</span>
                                </div></a></li>
                            <li class="notification"><a href="#">
                                <div class="image"><img src="/assets/admin/img/avatar5.png" alt="Avatar"></div>
                                <div class="notification-info"><span class="text"><span class="user-name">Emily Carter</span> is now following you</span><span class="date">5 days ago</span></div></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="footer"> <a href="#">View all notifications</a></div>
                  </li>
                </ul>
              </li>
              <li style="display: none" class="nav-item dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="icon mdi mdi-apps"></span></a>
                <ul class="dropdown-menu be-connections">
                  <li>
                    <div class="list">
                      <div class="content">
                        <div class="row">
                          <div class="col"><a href="#" class="connection-item"><img src="/assets/admin/img/github.png" alt="Github"><span>GitHub</span></a></div>
                          <div class="col"><a href="#" class="connection-item"><img src="/assets/admin/img/bitbucket.png" alt="Bitbucket"><span>Bitbucket</span></a></div>
                          <div class="col"><a href="#" class="connection-item"><img src="/assets/admin/img/slack.png" alt="Slack"><span>Slack</span></a></div>
                        </div>
                        <div class="row">
                          <div class="col"><a href="#" class="connection-item"><img src="/assets/admin/img/dribbble.png" alt="Dribbble"><span>Dribbble</span></a></div>
                          <div class="col"><a href="#" class="connection-item"><img src="/assets/admin/img/mail_chimp.png" alt="Mail Chimp"><span>Mail Chimp</span></a></div>
                          <div class="col"><a href="#" class="connection-item"><img src="/assets/admin/img/dropbox.png" alt="Dropbox"><span>Dropbox</span></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="footer"> <a href="#">More</a></div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
        
        
        
   
        

        
        
        
      <nav class="be-right-sidebar">
        <div class="sb-content">
          <div class="tab-navigation">
            <ul role="tablist" class="nav nav-tabs nav-justified">
              <li role="presentation" class="nav-item"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab" class="nav-link active">Chat</a></li>
              <li role="presentation" class="nav-item"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab" class="nav-link">Todo</a></li>
              <li role="presentation" class="nav-item"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab" class="nav-link">Settings</a></li>
            </ul>
          </div>
          <div class="tab-panel">
            <div class="tab-content">
              <div id="tab1" role="tabpanel" class="tab-pane tab-chat active">
                <div class="chat-contacts">
                  <div class="chat-sections">
                    <div class="be-scroller">
                      <div class="content">
                        <h2>Recent</h2>
                        <div class="contact-list contact-list-recent">
                          <div class="user"><a href="#"><img src="/assets/admin/img/avatar1.png" alt="Avatar">
                              <div class="user-data"><span class="status away"></span><span class="name">Claire Sassu</span><span class="message">Can you share the...</span></div></a></div>
                          <div class="user"><a href="#"><img src="/assets/admin/img/avatar2.png" alt="Avatar">
                              <div class="user-data"><span class="status"></span><span class="name">Maggie jackson</span><span class="message">I confirmed the info.</span></div></a></div>
                          <div class="user"><a href="#"><img src="/assets/admin/img/avatar3.png" alt="Avatar">
                              <div class="user-data"><span class="status offline"></span><span class="name">Joel King		</span><span class="message">Ready for the meeti...</span></div></a></div>
                        </div>
                        <h2>Contacts</h2>
                        <div class="contact-list">
                          <div class="user"><a href="#"><img src="/assets/admin/img/avatar4.png" alt="Avatar">
                              <div class="user-data2"><span class="status"></span><span class="name">Mike Bolthort</span></div></a></div>
                          <div class="user"><a href="#"><img src="/assets/admin/img/avatar5.png" alt="Avatar">
                              <div class="user-data2"><span class="status"></span><span class="name">Maggie jackson</span></div></a></div>
                          <div class="user"><a href="#"><img src="/assets/admin/img/avatar6.png" alt="Avatar">
                              <div class="user-data2"><span class="status offline"></span><span class="name">Jhon Voltemar</span></div></a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bottom-input">
                    <input type="text" placeholder="Search..." name="q"><span class="mdi mdi-search"></span>
                  </div>
                </div>
                <div class="chat-window">
                  <div class="title">
                    <div class="user"><img src="/assets/admin/img/avatar2.png" alt="Avatar">
                      <h2>Maggie jackson</h2><span>Active 1h ago</span>
                    </div><span class="icon return mdi mdi-chevron-left"></span>
                  </div>
                  <div class="chat-messages">
                    <div class="be-scroller">
                      <div class="content">
                        <ul>
                          <li class="friend">
                            <div class="msg">Hello</div>
                          </li>
                          <li class="self">
                            <div class="msg">Hi, how are you?</div>
                          </li>
                          <li class="friend">
                            <div class="msg">Good, I'll need support with my pc</div>
                          </li>
                          <li class="self">
                            <div class="msg">Sure, just tell me what is going on with your computer?</div>
                          </li>
                          <li class="friend">
                            <div class="msg">I don't know it just turns off suddenly</div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="chat-input">
                    <div class="input-wrapper"><span class="photo mdi mdi-camera"></span>
                      <input type="text" placeholder="Message..." name="q" autocomplete="off"><span class="send-msg mdi mdi-mail-send"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div id="tab2" role="tabpanel" class="tab-pane tab-todo">
                <div class="todo-container">
                  <div class="todo-wrapper">
                    <div class="be-scroller">
                      <div class="todo-content"><span class="category-title">Today</span>
                        <ul class="todo-list">
                          <li>
                            <label class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                              <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label">Initialize the project</span>
                            </label>
                          </li>
                          <li>
                            <label class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                              <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure							</span>
                            </label>
                          </li>
                          <li>
                            <label class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                              <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Updates changes to GitHub							</span>
                            </label>
                          </li>
                        </ul><span class="category-title">Tomorrow</span>
                        <ul class="todo-list">
                          <li>
                            <label class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                              <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Initialize the project							</span>
                            </label>
                          </li>
                          <li>
                            <label class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                              <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure							</span>
                            </label>
                          </li>
                          <li>
                            <label class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                              <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Updates changes to GitHub							</span>
                            </label>
                          </li>
                          <li>
                            <label class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                              <input type="checkbox" class="custom-control-input"><span title="This task is too long to be displayed in a normal space!" class="custom-control-label">This task is too long to be displayed in a normal space!							</span>
                            </label>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="bottom-input">
                    <input type="text" placeholder="Create new task..." name="q"><span class="mdi mdi-plus"></span>
                  </div>
                </div>
              </div>
              <div id="tab3" role="tabpanel" class="tab-pane tab-settings">
                <div class="settings-wrapper">
                  <div class="be-scroller"><span class="category-title">General</span>
                    <ul class="settings-list">
                      <li>
                        <div class="switch-button switch-button-sm">
                          <input type="checkbox" checked="" name="st1" id="st1"><span>
                            <label for="st1"></label></span>
                        </div><span class="name">Available</span>
                      </li>
                      <li>
                        <div class="switch-button switch-button-sm">
                          <input type="checkbox" checked="" name="st2" id="st2"><span>
                            <label for="st2"></label></span>
                        </div><span class="name">Enable notifications</span>
                      </li>
                      <li>
                        <div class="switch-button switch-button-sm">
                          <input type="checkbox" checked="" name="st3" id="st3"><span>
                            <label for="st3"></label></span>
                        </div><span class="name">Login with Facebook</span>
                      </li>
                    </ul><span class="category-title">Notifications</span>
                    <ul class="settings-list">
                      <li>
                        <div class="switch-button switch-button-sm">
                          <input type="checkbox" name="st4" id="st4"><span>
                            <label for="st4"></label></span>
                        </div><span class="name">Email notifications</span>
                      </li>
                      <li>
                        <div class="switch-button switch-button-sm">
                          <input type="checkbox" checked="" name="st5" id="st5"><span>
                            <label for="st5"></label></span>
                        </div><span class="name">Project updates</span>
                      </li>
                      <li>
                        <div class="switch-button switch-button-sm">
                          <input type="checkbox" checked="" name="st6" id="st6"><span>
                            <label for="st6"></label></span>
                        </div><span class="name">New comments</span>
                      </li>
                      <li>
                        <div class="switch-button switch-button-sm">
                          <input type="checkbox" name="st7" id="st7"><span>
                            <label for="st7"></label></span>
                        </div><span class="name">Chat messages</span>
                      </li>
                    </ul><span class="category-title">Workflow</span>
                    <ul class="settings-list">
                      <li>
                        <div class="switch-button switch-button-sm">
                          <input type="checkbox" name="st8" id="st8"><span>
                            <label for="st8"></label></span>
                        </div><span class="name">Deploy on commit</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
        
        
