 <link rel="preconnect" href="https://fonts.bunny.net">
 <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">
 <style>
     /* Reset & base */
     * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
     }

     body {
         font-family: 'Figtree', sans-serif;
         background-color: #f5f6f8;
         color: #333;
     }

     /* Layout */
     .page-wrapper {
         display: flex;
         min-height: 100vh;
     }

     /* Sidebar */
     .sidebar {
         width: 220px;
         background-color: #212529;
         color: #fff;
         padding: 20px;
     }

     .sidebar a {
         display: block;
         color: #ddd;
         text-decoration: none;
         padding: 8px 0;
         font-size: 14px;
     }

     .sidebar a:hover {
         color: #fff;
     }

     /* Main area */
     .main-content {
         flex: 1;
         display: flex;
         flex-direction: column;
     }

     /* Navbar */
     .navbar {
         background-color: #ffffff;
         border-bottom: 1px solid #ddd;
         padding: 12px 20px;
     }

     /* Page body */
     .body-content {
         flex: 1;
         padding: 20px;
         background-color: #f5f6f8;
     }

     /* Footer */
     .footer {
         background-color: #ffffff;
         border-top: 1px solid #ddd;
         padding: 10px 20px;
         text-align: center;
         font-size: 14px;
         color: #666;
     }

     /* Responsive (optional) */
     @media (max-width: 768px) {
         .page-wrapper {
             flex-direction: column;
         }

         .sidebar {
             width: 100%;
         }
     }

     .breadcrumb-header {
         padding: 15px 0;
         background-color: #c9dfe2;
         border-bottom: 1px solid #ddd;
         margin-bottom: 20px;
     }
 </style>
