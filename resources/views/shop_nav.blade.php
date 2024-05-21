{{--<!doctype html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--    <!-- Required meta tags -->--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <!-- Bootstrap CSS -->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}

{{--    <title>Hello, world!</title>--}}

{{--    <style>--}}
{{--        .calendar {--}}
{{--            display: flex;--}}
{{--            padding: 16px;--}}
{{--            background: white;--}}
{{--            border-radius: 4px;--}}
{{--            /*box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);*/--}}
{{--            border: 1px solid #000000;--}}
{{--        }--}}

{{--        .month-year {--}}
{{--            font-size: 2rem;--}}
{{--            line-height: 1;--}}
{{--            font-weight: 300;--}}
{{--            color: #94A3B8;--}}
{{--        }--}}

{{--        .year {--}}
{{--            margin-left: 5px;--}}
{{--            color: #CBD5E1;--}}
{{--        }--}}

{{--        .days {--}}
{{--            display: flex;--}}
{{--            flex-wrap: wrap;--}}
{{--            flex-grow: 1;--}}
{{--            /*margin-right: 46px;*/--}}
{{--            font-size: 20px;--}}
{{--        }--}}

{{--        .day-label {--}}
{{--            /*position: relative;*/--}}
{{--            /*flex-basis: calc(14.286% - 2px);*/--}}
{{--            /*margin: 1px 1px 12px 1px;*/--}}
{{--            height: 40px;--}}
{{--            font-weight: 600;--}}
{{--            font-size: 1rem;--}}
{{--            text-transform: uppercase;--}}
{{--            color: #1E293B;--}}
{{--        }--}}

{{--        .day {--}}
{{--            position: relative;--}}
{{--            flex-basis: calc(14.286% - 2px);--}}
{{--            margin: 1px;--}}
{{--            cursor: pointer;--}}
{{--            font-weight: 300;--}}
{{--            border: 1px solid;--}}
{{--            height: 8rem;--}}
{{--        }--}}

{{--        .day.dull {--}}
{{--            color: #94A3B8;--}}
{{--        }--}}

{{--        .day.today {--}}
{{--            color: #0EA5E9;--}}
{{--            font-weight: 600;--}}
{{--        }--}}

{{--        .day:hover {--}}
{{--            background: #E0F2FE;--}}
{{--        }--}}

{{--        .day .content {--}}
{{--            position: absolute;--}}
{{--            top: 5px;--}}
{{--            left: 10px;--}}
{{--            height: 100%;--}}
{{--            width: 100%;--}}
{{--            /*display: flex;*/--}}
{{--            /*justify-content: center;*/--}}
{{--            /*align-items: center;*/--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}

{{--<body>--}}

{{--    <div class="container mt-3">--}}

{{--        @php--}}
{{--            $test = 0;--}}
{{--            $date = \Carbon\Carbon::now();--}}
{{--            $date = $date->addMonth($test);--}}
{{--            $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(\Carbon\Carbon::SUNDAY);--}}
{{--            $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(\Carbon\Carbon::SATURDAY);--}}
{{--            $dayLabels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];--}}
{{--        @endphp--}}

{{--        <div class="d-flex justify-content-between align-items-center mb-3">--}}
{{--            <div class="month-year d-flex">--}}
{{--                <p class="month mb-0">{{$date->format('M')}}</p>--}}
{{--                <p class="year mb-0">{{$date->format('Y')}}</p>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--            <button class="btn btn-sm border border-dark">Prev</button>--}}
{{--            <button class="btn btn-sm border border-dark">Next</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="calendar">--}}
{{--            <div class="days">--}}
{{--                <div class="w-100 d-flex">--}}
{{--                @foreach ($dayLabels as $dayLabel)--}}
{{--                <p class="day-label w-100 d-flex justify-content-center align-items-center mb-2 border border-dark"> {{$dayLabel}} </p>--}}
{{--                @endforeach--}}
{{--                </div>--}}
{{--                @for($startOfCalendar; $startOfCalendar <= $endOfCalendar; $startOfCalendar->addDay())--}}
{{--                    <div class="day--}}
{{--                        {{$startOfCalendar->format('m') != $date->format('m') ? 'dull' : ''}}--}}
{{--                        {{$startOfCalendar->isToday() ? ' today' : ''}}">--}}

{{--                        <p class="content">{{ $startOfCalendar->format('j') }}</p>--}}
{{--                    </div>--}}
{{--                @endfor--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--    </div>--}}



















{{--    <!-- Optional JavaScript; choose one of the two! -->--}}

{{--    <!-- Option 1: Bootstrap Bundle with Popper -->--}}
{{--    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->--}}

{{--    <!-- Option 2: Separate Popper and Bootstrap JS -->--}}

{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>--}}

{{--</body>--}}

{{--</html>--}}

<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Dynamic Calendar JavaScript | CodingNepal</title>
{{--    <link rel="stylesheet" href="style.css">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font Link for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
{{--    <script src="script.js" defer></script>--}}
    <style>
        /* Import Google font - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body{
            display: flex;
            align-items: center;
            padding: 0 10px;
            justify-content: center;
            min-height: 100vh;
            background: #9B59B6;
        }
        .wrapper{
            width: 100%;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        }
        .wrapper header{
            display: flex;
            align-items: center;
            padding: 25px 30px 10px;
            justify-content: space-between;
        }
        header .icons{
            display: flex;
        }
        header .icons span{
            height: 38px;
            width: 38px;
            margin: 0 1px;
            cursor: pointer;
            color: #878787;
            text-align: center;
            line-height: 38px;
            font-size: 1.9rem;
            user-select: none;
            border-radius: 50%;
        }
        .icons span:last-child{
            margin-right: -10px;
        }
        header .icons span:hover{
            background: #f2f2f2;
        }
        header .current-date{
            font-size: 1.45rem;
            font-weight: 500;
        }
        .calendar{
            padding: 20px;
        }
        .calendar ul{
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            text-align: center;
        }
        .calendar .days{
            margin-bottom: 20px;
        }
        .calendar li{
            color: #333;
            width: calc(100% / 7);
            font-size: 1.07rem;
        }
        .calendar .weeks li{
            font-weight: 500;
            cursor: default;
        }
        .calendar .days li{
            z-index: 1;
            cursor: pointer;
            position: relative;
            margin-top: 30px;
        }
        .days li.inactive{
            color: #aaa;
        }
        .days li.active{
            color: #fff;
        }
        .days li::before{
            position: absolute;
            content: "";
            left: 50%;
            top: 50%;
            height: 40px;
            width: 40px;
            z-index: -1;
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }
        .days li.active::before{
            background: #9B59B6;
        }
        .days li:not(.active):hover::before{
            background: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <header>
        <p class="current-date"></p>
        <div class="icons">
            <span id="prev" class="material-symbols-rounded">chevron_left</span>
            <span id="next" class="material-symbols-rounded">chevron_right</span>
        </div>
    </header>
    <div class="calendar">
        <ul class="weeks">
            <li>Sun</li>
            <li>Mon</li>
            <li>Tue</li>
            <li>Wed</li>
            <li>Thu</li>
            <li>Fri</li>
            <li>Sat</li>
        </ul>
        <ul class="days"></ul>
    </div>
</div>

<script>
    const daysTag = document.querySelector(".days"),
        currentDate = document.querySelector(".current-date"),
        prevNextIcon = document.querySelectorAll(".icons span");

    // getting new date, current year and month
    let date = new Date(),
        currYear = date.getFullYear(),
        currMonth = date.getMonth();

    // storing full name of all months in array
    const months = ["January", "February", "March", "April", "May", "June", "July",
        "August", "September", "October", "November", "December"];

    const renderCalendar = () => {
        let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
            lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
            lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
            lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
        let liTag = "";

        for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
            liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
        }

        for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
            // adding active class to li if the current day, month, and year matched
            let isToday = i === date.getDate() && currMonth === new Date().getMonth() && currYear === new Date().getFullYear() ? "active" : "";
            liTag += `<li class="${isToday}">${i}</li>`;
        }

        for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
            liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
        }
        currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
        daysTag.innerHTML = liTag;
    }
    renderCalendar();

    prevNextIcon.forEach(icon => { // getting prev and next icons
        icon.addEventListener("click", () => { // adding click event on both icons
            // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
            currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

            if(currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
                // creating a new date of current year & month and pass it as date value
                date = new Date(currYear, currMonth, new Date().getDate());
                currYear = date.getFullYear(); // updating current year with new date year
                currMonth = date.getMonth(); // updating current month with new date month
            } else {
                date = new Date(); // pass the current date as date value
            }
            renderCalendar(); // calling renderCalendar function
        });
    });
</script>
</body>
</html>
