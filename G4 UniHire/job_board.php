<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job Board</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="icon" href="https://batstate-u.edu.ph/wp-content/uploads/2022/05/BatStateU-NEU-Logo.png" type="image/x-icon">


    <style>
        html, body {
            margin: 0;
            padding: 0;
            background: url('https://batstate-u.edu.ph/wp-content/uploads/2020/10/lipa-slider-1-scaled.jpg');
            background-size: cover;
            background-position: center;
            height: 100%;
            opacity: 0.95;
            background-attachment: fixed;
        }

        main {
            max-width: 1200px;
            margin: 75px auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            text-align: center;
            border-radius: 50px;
            font-size: 18px; /* Increased font size */
        }

        header {
            background-color: #f0f0f0;
            color: #fff;
            text-align: center;
            margin-top: 20px;
        }

        h1 {
            margin: 10px;
            position: absolute;
            top: 40px;
            left: 30px;
            text-align: center;
        }

        h2 {
            margin: 10px;
            position: absolute;
            top: 150px;
            left: 80px;
            text-align: center;
        }

        nav {
            background-color: #f0f0f0;
            padding: 20px;
            margin-top: 20px;
            background: linear-gradient(#420810, #D20808, #AA0808);
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav li {
            display: inline;
            margin: 0 10px;
        }

        .nav-item {
            display: inline-block;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color .3s;
            color: #FFFFFF;
            margin-left: 20px;
            font-size: 20px;
            font-weight: bold;
            font-family: 'Segoe UI', sans-serif;
        }

        .nav-item:hover {
            background-color: #FFFFFF;
            color: #02232F;
        }

        .nav-item.profile,
        .nav-item.sign-out {
            float: right;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        .about-us {
            padding: 40px;
            text-align: center;
        }

        .about-us h3 {
            font-size: 30px;
            color: #ff0000;
            font-family: 'OpenSans', sans-serif;
        }

        .search-container {
            display: flex;
            align-items: center;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            width: 300px;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        .search-icon {
            color: #000000;
            margin-right: 10px;
        }

        .search-box {
            border: none;
            outline: none;
            width: 100%;
        }

        .search-button {
            background-color: #000000;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            font-size: 16px;
            cursor: pointer;
        }

        .sign-out-button {
            position: absolute;
            top: 40px;
            right: 20px;
        }

        .additional-info {
            text-align: right;
        }
        

        .status-circle {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            margin-right: 10px;
            margin-left: 10px;
            margin-top: 15px;
            margin-bottom: -20px; 
        }

        .job-container {
            position: relative;
            width: 30%;
            height: 240px;
            margin: 10px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 20px;
            padding: 2px;
            background-color: #f9f9f9;
            display: inline-block;
            box-sizing: border-box;
            overflow: hidden;
        }

        .job-title-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .job-container p {
            font-size: 27px;
            margin-bottom: 5px;
        }

        .job-details p {
            font-size: 18px;
        }

        .status-active {
            background-color: green;
        }

        .status-full {
            background-color: red;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            padding: 10px;
            margin: 0 5px;
            text-decoration: none;
            color: #000;
            background-color: #ddd;
            border-radius: 5px;
        }

        .pagination a:hover {
            background-color: #bbb;
        }

        .view-job-button {
            position: absolute;
            bottom: 10px; 
            left: 50%; 
            transform: translateX(-50%); 
            width: 120px;
            margin: 20px auto;
            padding: 10px 15px;
            text-align: center;
            background-color: #ffffff;
            border-radius: 20px;
            color: #D20808;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.5s ease-in-out;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .view-job-button:hover {
            box-shadow: 1px 1px 10px #252525;
            border: none;
            background-color: #D20808;
            color: #ffffff;
        }

        .view-job-button:hover::after {
            visibility: visible;
            transform: scale(1.5) translateX(2px);
            background-color: #073141;
        }

        .view-job-button.full-status-hover:hover,
        .view-job-button.full-status-hover.hovered {
            box-shadow: 1px 1px 10px #252525;
            border: none;
            background-color: #D20808;
            color: #ffffff;
        }

        .view-job-button.full-status-hover:hover::after,
        .view-job-button.full-status-hover.hovered::after {
            visibility: visible;
            transform: scale(1.5) translateX(2px);
            background-color: #073141;
        }

        .view-job-button.disabled {
        cursor: not-allowed;
        }

        .search-button {
            background-color: #000000;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .search-button:hover {
            background-color: #D20808;
            color: #ffffff;
        }


    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a class="nav-item" href="homepage.php">Home</a></li>
        </ul>
    </nav>


    <main>
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <select class="search-box" id="filter" name="filter">
                <option value="all">All Jobs</option>
                <option value="active">Active Jobs</option>
                <option value="full">Full Jobs</option>
            </select>
            <button class="search-button" onclick="applyFilter()">Filter</button>
        </div>

        <?php
            include("db.php");

            $records_per_page = 5;
            $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
            $start_from = ($page - 1) * $records_per_page;

            $filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

            $sql = "SELECT jobtitle, departmentname, hiringstatus FROM tbjobs";
            
            // Apply filter
            if ($filter === 'active') {
                $sql .= " WHERE hiringstatus = 'Active'";
            } elseif ($filter === 'full') {
                $sql .= " WHERE hiringstatus = 'Full'";
            }

            $sql .= " LIMIT $start_from, $records_per_page";

            $result = $conn->query($sql);

            if ($result === false) {
                die("Error executing query: " . $sql . "<br>" . $conn->error);
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='job-container'>";
                    
                    $statusClass = ($row['hiringstatus'] === 'Active') ? 'status-active' : 'status-full';
                    
                    echo "<div class='status-circle $statusClass'></div>";
                    
                    echo "<p>{$row['jobtitle']}</p>";
                    echo "<div class='job-details'>";
                    echo "<p>Department: {$row['departmentname']}</p>";
                    
                    $buttonClass = ($row['hiringstatus'] === 'Full') ? 'view-job-button disabled' : 'view-job-button full-status-hover';
                    $buttonText = ($row['hiringstatus'] === 'Full') ? 'Job Full' : 'View Job';
                    echo "<a href='job_info.php?jobtitle=" . urlencode($row['jobtitle']) . "' class='$buttonClass'>$buttonText</a>";
                    
                    echo "</div>";
                    echo "</div>";
                }

                $sql = "SELECT COUNT(jobTitle) AS total FROM tbjobs";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $total_pages = ceil($row["total"] / $records_per_page);

                echo "<div class='pagination'>";
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo "<a href='job_board.php?page=$i'>$i</a>";
                }
                echo "</div>";
            } else {
                echo "0 results";
            }

            $conn->close();
        ?>


         <script>
            document.addEventListener('DOMContentLoaded', function () {
                const fullStatusButtons = document.querySelectorAll('.job-container .full-status-hover');

                fullStatusButtons.forEach(button => {
                    button.addEventListener('touchstart', function () {
                        this.classList.toggle('hovered');
                    });
                });
            });
        </script>

        <script>
            function applyFilter() {
                var selectedFilter = document.getElementById("filter").value;
                window.location.href = "job_board.php?filter=" + selectedFilter;
            }

            document.addEventListener('DOMContentLoaded', function () {
                const fullStatusButtons = document.querySelectorAll('.job-container .full-status-hover');

                fullStatusButtons.forEach(button => {
                    button.addEventListener('touchstart', function () {
                        this.classList.toggle('hovered');
                    });
                });
            });
        </script>

</body>
</html>