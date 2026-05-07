<?php

session_start();
include 'php/db.php';

if (!isset($_SESSION['user_id'])) {
    die("Please login first.");
}

$user_id = $_SESSION['user_id'];

$query = $conn->query("
    SELECT * FROM student_profiles
    WHERE user_id='$user_id'
");

if ($query->num_rows == 0) {
    die("Please complete your profile first.");
}

$profile = $query->fetch_assoc();

$gpa = $profile['gpa'];
$ielts = $profile['ielts_score'];
$budget = $profile['budget'];

$score = 0;

if($gpa >= 3.5){
    $score += 35;
}
elseif($gpa >= 3.0){
    $score += 25;
}
else{
    $score += 15;
}

if($ielts >= 7.0){
    $score += 35;
}
elseif($ielts >= 6.0){
    $score += 25;
}
else{
    $score += 10;
}

if($budget >= 1500000){
    $score += 30;
}
elseif($budget >= 1000000){
    $score += 20;
}
else{
    $score += 10;
}

$status = "Low Readiness";
$badgeClass = "status-danger";

if($score >= 80){

    $status = "Excellent Readiness";
    $badgeClass = "status-success";

}
elseif($score >= 60){

    $status = "Moderate Readiness";
    $badgeClass = "status-warning";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Visa Readiness
    </title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<header class="navbar">

    <div class="logo">
        SV-DSS
    </div>

    <nav>

        <a href="dashboard.html">Dashboard</a>
        <a href="profile.html">Profile</a>
        <a href="index.html">Home</a>

    </nav>

</header>

<div class="container">

    <h1 class="section-title">
        Visa Readiness Analytics
    </h1>

    <p class="features-subtitle">

        AI-inspired readiness evaluation generated
        from your academic profile, IELTS score,
        and financial capability.

    </p>

    <div class="dashboard-grid">

        <div class="dashboard-card">

            <h3>
                Overall Readiness
            </h3>

            <div class="card-value">

                <?php echo $score; ?>%

            </div>

            <div class="progress-bar">

                <div
                    class="progress-fill"

                    style="width: <?php echo $score; ?>%;"
                ></div>

            </div>

            <br>

            <span class="<?php echo $badgeClass; ?>">

                <?php echo $status; ?>

            </span>

            <div class="analytics-box">

                <div class="analytics-item">

                    <span>Profile Strength</span>

                    <strong>
                        High
                    </strong>

                </div>

                <div class="analytics-item">

                    <span>Financial Stability</span>

                    <strong>
                        Verified
                    </strong>

                </div>

                <div class="analytics-item">

                    <span>Application Risk</span>

                    <strong>
                        Low
                    </strong>

                </div>

            </div>

        </div>

        <div class="dashboard-card">

            <h3>
                Academic Analysis
            </h3>

            <br>

            <p class="card-meta">

                GPA:
                <strong>
                    <?php echo $gpa; ?>
                </strong>

            </p>

            <p class="card-meta">

                IELTS:
                <strong>
                    <?php echo $ielts; ?>
                </strong>

            </p>

            <p class="card-meta">

                Budget:
                <strong>
                    ৳ <?php echo number_format($budget); ?>
                </strong>

            </p>

            <div class="country-insight-box">

                <h4>
                    AI Recommendation
                </h4>

<?php

if($ielts < 6.5){

    echo "
    <p class='card-meta'>
        Improve IELTS score to 6.5+
        to increase university and visa approval chances.
    </p>
    ";
}

elseif($gpa < 3.0){

    echo "
    <p class='card-meta'>
        Focus on stronger university selection
        and scholarship opportunities.
    </p>
    ";
}

else{

    echo "
    <p class='card-meta'>
        Your profile is highly competitive
        for international study applications.
    </p>
    ";
}

?>

            </div>

        </div>

        <div class="dashboard-card">

            <h3>
                Improvement Suggestions
            </h3>

            <br>

            <ul class="suggestion-list">

                <li>
                    Improve IELTS score for higher approval rate
                </li>

                <li>
                    Increase financial documents and sponsorship proof
                </li>

                <li>
                    Target countries matching your academic profile
                </li>

                <li>
                    Upload all required documents completely
                </li>

            </ul>

        </div>

    </div>

    <div style="
        text-align:center;
        margin-top:60px;
    ">

        <a href="dashboard.html">

            <button>

                Back to Dashboard

            </button>

        </a>

    </div>

</div>

</body>

</html>