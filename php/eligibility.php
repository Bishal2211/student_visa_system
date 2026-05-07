<?php

session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    die("Please login first.");
}

$user_id = $_SESSION['user_id'];

$profile_query = $conn->query("
    SELECT * FROM student_profiles
    WHERE user_id='$user_id'
");

if ($profile_query->num_rows == 0) {
    die("Please complete your profile first.");
}

$profile = $profile_query->fetch_assoc();

$gpa = $profile['gpa'];
$ielts = $profile['ielts_score'];
$budget = $profile['budget'];

$countries = $conn->query("
    SELECT * FROM countries
");

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
        Eligibility Results
    </title>

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

<header class="navbar">

    <div class="logo">
        SV-DSS
    </div>

    <nav>
        <a href="../dashboard.html">Dashboard</a>
        <a href="../profile.html">Profile</a>
        <a href="../index.html">Home</a>
    </nav>

</header>

<div class="container">

    <h1 class="section-title">
        Eligibility Results
    </h1>

    <p class="features-subtitle">

        Dynamic country and university recommendations
        generated from your academic profile and financial capability.

    </p>

    <div class="dashboard-grid">

<?php

while ($country = $countries->fetch_assoc()) {

    $status = "LOW";
    $statusText = "Not Eligible";
    $badgeClass = "status-danger";
    $progress = 35;

    if (
        $gpa >= $country['min_gpa'] &&
        $ielts >= $country['min_ielts'] &&
        $budget >= $country['estimated_cost']
    ) {

        $status = "HIGH";
        $statusText = "Eligible";
        $badgeClass = "status-success";
        $progress = 92;

    }

    elseif (
        $gpa >= ($country['min_gpa'] - 0.3)
    ) {

        $status = "MEDIUM";
        $statusText = "Moderate Chance";
        $badgeClass = "status-warning";
        $progress = 65;
    }

?>

        <div class="dashboard-card">

            <div style="
                display:flex;
                justify-content:space-between;
                align-items:center;
                margin-bottom:25px;
            ">

                <h3>

                    <?php
                    echo $country['country_name'];
                    ?>

                </h3>

                <span class="<?php echo $badgeClass; ?>">

                    <?php
                    echo $statusText;
                    ?>

                </span>

            </div>

            <div class="card-value">

                <?php
                echo $status;
                ?>

            </div>

            <div class="progress-bar">

                <div
                    class="progress-fill"

                    style="width: <?php echo $progress; ?>%;"
                ></div>

            </div>

            <br>

            <p class="card-meta">

                Required GPA:
                <strong>

                    <?php
                    echo $country['min_gpa'];
                    ?>

                </strong>

            </p>

            <p class="card-meta">

                Required IELTS:
                <strong>

                    <?php
                    echo $country['min_ielts'];
                    ?>

                </strong>

            </p>

            <p class="card-meta">

                Estimated Cost:
                <strong>

                    ৳
                    <?php
                    echo number_format($country['estimated_cost']);
                    ?>

                </strong>

            </p>

            <hr style="
                margin:25px 0;
                border:none;
                border-top:1px solid #e2e8f0;
            ">

            <h4 style="
                margin-bottom:18px;
                color:#0f172a;
            ">
                Your Profile
            </h4>

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

                    ৳
                    <?php echo number_format($budget); ?>

                </strong>

            </p>

            <div class="country-insight-box">

                <h4>
                    Country Insights
                </h4>

                <div class="insight-grid">

                    <div class="insight-item">
                        <span>Visa Success</span>
                        <strong>
                            <?php echo $country['visa_success_rate']; ?>%
                        </strong>
                    </div>

                    <div class="insight-item">
                        <span>Part-Time Jobs</span>
                        <strong>
                            <?php echo $country['part_time_hours']; ?> hrs
                        </strong>
                    </div>

                    <div class="insight-item">
                        <span>Estimated Cost</span>
                        <strong>
                            ৳ <?php echo number_format($country['estimated_cost']); ?>
                        </strong>
                    </div>

                    <div class="insight-item">
                        <span>Application Status</span>
                        <strong>
                            <?php echo $statusText; ?>
                        </strong>
                    </div>

                </div>

            </div>

            <h4 style="
                margin-bottom:18px;
                color:#0f172a;
            ">
                Recommended Universities
            </h4>

<?php

$country_id = $country['country_id'];

$universities = $conn->query("

    SELECT * FROM universities

    WHERE country_id='$country_id'

    AND required_gpa <= '$gpa'

    AND required_ielts <= '$ielts'

");

if ($universities->num_rows > 0) {

    while ($uni = $universities->fetch_assoc()) {

?>

        <div class="mini-university-card">

            <strong>

                <?php
                echo $uni['university_name'];
                ?>

            </strong>

            <p>

                Required GPA:
                <?php
                echo $uni['required_gpa'];
                ?>

            </p>

            <p>

                Required IELTS:
                <?php
                echo $uni['required_ielts'];
                ?>

            </p>

            <p>

                Tuition Fee:
                ৳
                <?php
                echo number_format($uni['tuition_fee']);
                ?>

            </p>

        </div>

<?php

    }

}

else {

?>

    <p class="card-meta">

        No university matches found based on your profile.

    </p>

<?php

}

?>

        </div>

<?php

}

?>

    </div>

    <div style="
        text-align:center;
        margin-top:60px;
    ">

        <a href="../dashboard.html">

            <button>

                Back to Dashboard

            </button>

        </a>

    </div>

</div>

</body>

</html>