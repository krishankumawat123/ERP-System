<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: faculty_login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <title>Sidebar menu responsive</title>
</head>
<style>
/*===== GOOGLE FONTS =====*/
@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

/*===== VARIABLES CSS =====*/
:root {
    --header-height: 3rem;
    --nav-width: 68px;

    /*===== Colors =====*/
    --first-color: #0a043c;
    --first-color-light: #AFA5D9;
    --white-color: #F7F6FB;

    /*===== Font and typography =====*/
    --body-font: 'Nunito', sans-serif;
    --normal-font-size: 1rem;

    /*===== z index =====*/
    --z-fixed: 100;
}

/*===== BASE =====*/
*,
::before,
::after {
    box-sizing: border-box;
}

body {
    position: relative;
    margin: var(--header-height) 0 0 0;
    padding: 0 1rem;
    font-family: var(--body-font);
    font-size: var(--normal-font-size);
    transition: .5s;
}

a {
    text-decoration: none;
}

.header {
    width: 100%;
    height: var(--header-height);
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1rem;
    background-color: var(--white-color);
    z-index: var(--z-fixed);
    transition: .5s;
}

.header__toggle {
    color: var(--first-color);
    font-size: 1.5rem;
    cursor: pointer;
}

.header__img {
    width: 35px;
    height: 35px;
    display: flex;
    justify-content: center;
    border-radius: 50%;
    overflow: hidden;
}

.header__img img {
    width: 40px;
}

.l-navbar {
    position: fixed;
    top: 0;
    left: -30%;
    width: var(--nav-width);
    height: 100vh;
    background: var(--first-color);
    padding: .5rem 1rem 0 0;
    transition: .5s;
    z-index: var(--z-fixed);
}

.nav {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
}

.nav__logo,
.nav__link {
    display: grid;
    grid-template-columns: max-content max-content;
    align-items: center;
    column-gap: 1rem;
    padding: .5rem 0 .5rem 1.5rem;
}

.nav__logo {
    margin-bottom: 2rem;
}

.nav__logo-icon {
    font-size: 1.25rem;
    color: var(--white-color);
}

.nav__logo-name {
    font-weight: 700;
    color: var(--white-color);
}

.nav__link {
    position: relative;
    color: var(--first-color-light);
    margin-bottom: 1.5rem;
    transition: .3s;
}

.nav__link:hover {
    color: var(--white-color);
}

.nav__icon {
    font-size: 1.25rem;
}

.show {
    left: 0;
}

.body-pd {
    padding-left: calc(var(--nav-width) + 1rem);
}

.active {
    color: var(--white-color);
}

.active::before {
    content: '';
    position: absolute;
    left: 0;
    width: 2px;
    height: 32px;
    background-color: var(--white-color);
}

h1 {
    padding: 2rem 0 0;
}

p {
    color: #333;
    line-height: 1.6;
}

@media screen and (min-width:768px) {
    body {
        margin: calc(var(--header-height) + 1rem) 0 0 0;
        padding-left: calc(var(--nav-width) + 2rem);
    }

    .header {
        height: calc(var(--header-height) + 1rem);
        padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
    }

    .header__img {
        width: 40px;
        height: 40px;
    }

    .header__img img {
        width: 45px;
    }

    .l-navbar {
        left: 0;
        padding: 1rem 1rem 0 0;
    }

    .show {
        width: calc(var(--nav-width) + 156px);
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 188px);
    }
}
</style>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div class="header__toggle">
            <p class="alert-heading">Welcome - <?php echo $_SESSION['username']?></p>
        </div>
        <div>
            <a href="admin_logout.php" class="header_toggle">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <div class="nav__list">
                    <a href="admin_dashbord.php" class="nav__link active">
                    <i class='fas fa-fw fa-home' ></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
                    <a href="admin_students.php" class="nav__link">
                        <span class="iconify" data-icon="mdi:human-male-female" data-inline="false"></span>
                        <span class="nav__name">Students</span>
                    </a>
                    <a href="admin_faculty.php" class="nav__link">
                        <span class="iconify" data-icon="mdi:account" data-inline="false"></span>
                        <span class="nav__name">Faculty</span>
                    </a>
                    <a href="admin_notes.php" class="nav__link">
                        <span class="iconify" data-icon="mdi:file-document-edit" data-inline="false"></span>
                        <span class="nav__name">Notes</span>
                    </a>
                    <a href="admin_fill_subject.php" class="nav__link">
                        <i class='bx bx-message-square-detail nav__icon'></i>
                        <span class="nav__name">Add Subject</span>
                    </a>
                    <a href="admin_student_attendance.php" class="nav__link">
                        <i class='bx bx-list-ul nav__icon'></i>
                        <span class="nav__name">Student Attendance</span>
                    </a>
                    <a href="admin_student_signup1.php" class="nav__link">
                        <i class='bx bx-bar-chart-alt-2 nav__icon'></i>
                        <span class="nav__name">Student Request</span>
                    </a>
                    <a href="admin_faculty_signup1.php" class="nav__link">
                        <i class='bx bx-mail-send nav__icon'></i>
                        <span class="nav__name">Faculty Request</span>
                    </a>
                    <a href="admin_timetable.php" class="nav__link">
                        <span class="iconify" data-icon="mdi:file-cog" data-inline="false"></span>
                        <span class="nav__name">Time Table</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- <a href="#" class="image full"><img src="img/our-students.jpg" style="width:1000px;" style="background-attachment: fixed;" style="background-size: contain;"  > </a> -->
    <!-- Page Content -->
    <!--===== MAIN JS =====-->
    <script>
    /*===== SHOW NAVBAR  =====*/

    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
                nav.classList.toggle('show')

                toggle.classList.toggle('bx-x')

                bodypd.classList.toggle('body-pd')

                headerpd.classList.toggle('body-pd')
            })
        }
    }

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

    const linkColor = document.querySelectorAll('.nav__link')

    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
        }
    }
    linkColor.forEach(l => l.addEventListener('click', colorLink))
    </script>
</body>

</html>