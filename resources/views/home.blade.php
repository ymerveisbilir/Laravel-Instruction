
<style>
.layout-wrapper1 {
         width: 1170px;
         max-width: 100%;
         margin: 0 auto;
         padding: 15px;
       }
       
       .layout-wrapper1 header,
       .layout-wrapper1 footer,
       .layout-wrapper1 .main-content,
       .layout-wrapper1 .sidebar {
         position: relative;
         background-color: #e9e9f4;
         margin-bottom: 10px;
       }
       
     
       
       .layout-wrapper1 header,
       .layout-wrapper1 footer {
         min-height: 100px;
         clear: both;
         width: 100%;
         flex-wrap: wrap;
       }
       
       .layout-wrapper1 .sidebar {
         width: 250px;
         float: left;
         min-height: 450px;
       }
       
       .layout-wrapper1 .main-content {
         width: calc(100% - 260px);
         margin-left: 10px;
         float: left;
         min-height: 450px;
       }
       
       @media only screen and (max-width: 768px) {
         .layout-wrapper1 .main-content,
         .layout-wrapper1 .sidebar {
           width: 100%;
           float: none;
           min-height: 300px;
           padding: 0;
           margin-left: 0;
         }
       }
                           
          </style>           
<div class="layout-wrapper1">
         <header class="layout-header" data-title="#header">
                     
         </header>
         <div class="sidebar" data-title="#sidebar">
                     
                     
         </div>
         <div class="main-content" data-title="#main-content">
                     
         </div>
         <footer class="layout-footer" data-title="#footer">
                     
         </footer>
     </div>
                     