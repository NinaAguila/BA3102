<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        /**Poppins Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            width: 100%;
            height: 100vh;
            background: black;
            font-family: 'Poppins';
            display: flex;
            justify-content: center;
            align-items: center;

        .card{
            width: 320px;
            height: 500px;
            border-radius: 20px;
            overflow: hidden;
            border: 8px solid #5c050e;
            position: relative;
        }
        .card-img{
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
        }

        .card-body{
            width: 100%;
            height: 100%;
            top: 0;
            right: -100%;
            position: absolute;
            background: #1f3d4738;
            backdrop-filter: blur(5px);
            border-radius: 15px;
            color: #fff;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            transition: 2s;
        }

        .card-title{
            text-transform: uppercase;
            font-size: 50px;
            font-weight: 500;
        }

        .card-subtitle{
            text-transform: capitalize;
            font-size: 14px;
            font-weight: 300;
        }

        .card-info{
            font-size: 16px;
            line-height: 25px;
            margin: 40px 0;
            font-weight: 400;
        }

        .card:hover .card-body{
            right: 0;
        }

        
        }

    </style>

</head>

<body>
    <div class="card">
        <img src="images/basketball.jpg" class="card-img" alt="">
        <div class="card-body">
            <h1 class="card-title"></h1>  <!-- equipment_name-->
            <p class="card-subtitle"></p> <!-- equipment_category-->
            <p class="info"></p>          <!-- brand, quantity, description,purchase date, condition-->
        </div>

    </div>
</body>
</html>