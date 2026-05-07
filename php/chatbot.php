<?php

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

$message = strtolower(trim($data['message']));

$response = "Sorry, I could not understand your question. Please ask a visa or study abroad related question.";

/* HELLO */

if (
    strpos($message, 'hello') !== false ||
    strpos($message, 'hi') !== false
) {

    $response = "Hello! Ask me anything related to student visas, universities, IELTS, scholarships, or study abroad.";
}

/* CANADA */

elseif (
    strpos($message, 'canada') !== false
) {

    if (
        strpos($message, 'ielts') !== false
    ) {

        $response = "Canada generally requires 6.5 IELTS for most universities and student visa applications.";
    }

    elseif (
        strpos($message, 'cost') !== false ||
        strpos($message, 'budget') !== false
    ) {

        $response = "Average study cost in Canada can range from 15 to 30 lakh BDT per year depending on university and city.";
    }

    elseif (
        strpos($message, 'work') !== false
    ) {

        $response = "Canada allows international students to work part-time during study periods.";
    }

    else {

        $response = "Canada is one of the most popular study destinations due to high visa success and PR opportunities.";
    }
}

/* UK */

elseif (
    strpos($message, 'uk') !== false ||
    strpos($message, 'united kingdom') !== false
) {

    if (
        strpos($message, 'ielts') !== false
    ) {

        $response = "The UK usually requires 6.0 to 6.5 IELTS depending on university requirements.";
    }

    elseif (
        strpos($message, 'work') !== false
    ) {

        $response = "UK students can work part-time while studying according to visa regulations.";
    }

    else {

        $response = "The UK offers globally recognized universities and strong graduate pathways.";
    }
}

/* AUSTRALIA */

elseif (
    strpos($message, 'australia') !== false
) {

    $response = "Australia provides excellent post-study work opportunities and high-quality education.";
}

/* USA */

elseif (
    strpos($message, 'usa') !== false ||
    strpos($message, 'america') !== false
) {

    $response = "USA universities may require IELTS or TOEFL. Tuition fees vary based on university ranking and location.";
}

/* GERMANY */

elseif (
    strpos($message, 'germany') !== false
) {

    $response = "Germany is popular for low tuition fees and strong engineering programs.";
}

/* ITALY */

elseif (
    strpos($message, 'italy') !== false
) {

    $response = "Italy is popular for affordable tuition fees, scholarship opportunities, and historic universities.";
}

/* FINLAND */

elseif (
    strpos($message, 'finland') !== false
) {

    $response = "Finland offers high-quality education, modern research facilities, and excellent student life.";
}

/* HUNGARY */

elseif (
    strpos($message, 'hungary') !== false
) {

    $response = "Hungary is known for affordable tuition fees and the Stipendium Hungaricum scholarship program.";
}

/* SWEDEN */

elseif (
    strpos($message, 'sweden') !== false
) {

    $response = "Sweden provides innovative education systems and strong technology-focused universities.";
}

/* NETHERLANDS */

elseif (
    strpos($message, 'netherlands') !== false
) {

    $response = "The Netherlands offers globally ranked universities and many English-taught programs.";
}

/* FRANCE */

elseif (
    strpos($message, 'france') !== false
) {

    $response = "France is popular for business, fashion, and arts education with affordable public universities.";
}

/* JAPAN */

elseif (
    strpos($message, 'japan') !== false
) {

    $response = "Japan offers advanced technology education and scholarship opportunities for international students.";
}

/* SOUTH KOREA */

elseif (
    strpos($message, 'korea') !== false
) {

    $response = "South Korea is becoming popular for technology, engineering, and scholarship opportunities.";
}

/* NEW ZEALAND */

elseif (
    strpos($message, 'new zealand') !== false
) {

    $response = "New Zealand offers quality education and peaceful student living environments.";
}

/* DENMARK */

elseif (
    strpos($message, 'denmark') !== false
) {

    $response = "Denmark provides modern education systems and strong research opportunities.";
}

/* NORWAY */

elseif (
    strpos($message, 'norway') !== false
) {

    $response = "Norway is famous for tuition-free public universities and high living standards.";
}

/* SWITZERLAND */

elseif (
    strpos($message, 'switzerland') !== false
) {

    $response = "Switzerland is known for hospitality, business, and premium education quality.";
}

/* IELTS */

elseif (
    strpos($message, 'ielts') !== false
) {

    $response = "Most countries require IELTS scores between 6.0 and 6.5 for undergraduate and postgraduate admissions.";
}

/* GPA */

elseif (
    strpos($message, 'gpa') !== false
) {

    $response = "Higher GPA improves university admission and student visa approval chances.";
}

/* SCHOLARSHIP */

elseif (
    strpos($message, 'scholarship') !== false
) {

    $response = "Strong GPA, IELTS score, extracurricular activities, and SOP increase scholarship opportunities.";
}

/* DOCUMENTS */

elseif (
    strpos($message, 'documents') !== false ||
    strpos($message, 'document') !== false
) {

    $response = "Required documents usually include passport, transcripts, IELTS certificate, SOP, recommendation letters, and bank statement.";
}

/* SOP */

elseif (
    strpos($message, 'sop') !== false ||
    strpos($message, 'statement of purpose') !== false
) {

    $response = "An SOP explains your academic background, study goals, and future career plans.";
}

/* BANK STATEMENT */

elseif (
    strpos($message, 'bank statement') !== false
) {

    $response = "Bank statements are used to prove financial capability for tuition fees and living expenses.";
}

/* VISA SUCCESS */

elseif (
    strpos($message, 'visa success') !== false ||
    strpos($message, 'approval') !== false
) {

    $response = "Visa approval depends on GPA, IELTS score, financial proof, and document quality.";
}

/* PART TIME */

elseif (
    strpos($message, 'part time') !== false ||
    strpos($message, 'job') !== false ||
    strpos($message, 'work permit') !== false
) {

    $response = "Many countries allow international students to work part-time while studying.";
}

/* COST */

elseif (
    strpos($message, 'cost') !== false ||
    strpos($message, 'tuition') !== false
) {

    $response = "Tuition fees and living costs vary depending on country, university, and city.";
}

/* BEST COUNTRY */

elseif (
    strpos($message, 'best country') !== false
) {

    $response = "Canada, Australia, UK, Germany, Finland, and Netherlands are among the best destinations for international students.";
}

/* PR */

elseif (
    strpos($message, 'pr') !== false ||
    strpos($message, 'permanent residency') !== false
) {

    $response = "Canada and Australia are popular for post-study PR opportunities.";
}

/* UNIVERSITY */

elseif (
    strpos($message, 'university') !== false
) {

    $response = "University selection depends on GPA, IELTS score, budget, and preferred study program.";
}

/* DEADLINE */

elseif (
    strpos($message, 'deadline') !== false
) {

    $response = "Application deadlines vary by university and intake season.";
}

/* INTERVIEW */

elseif (
    strpos($message, 'interview') !== false
) {

    $response = "Visa interviews usually focus on study plans, financial proof, and future goals.";
}

/* LIVING COST */

elseif (
    strpos($message, 'living cost') !== false
) {

    $response = "Living expenses depend on country and city but include accommodation, food, and transportation.";
}

/* HOSTEL */

elseif (
    strpos($message, 'hostel') !== false ||
    strpos($message, 'accommodation') !== false
) {

    $response = "Students can choose university dormitories, shared apartments, or private accommodation.";
}

/* THANKS */

elseif (
    strpos($message, 'thanks') !== false ||
    strpos($message, 'thank you') !== false
) {

    $response = "You are welcome. Best of luck for your study abroad journey!";
}

echo json_encode([
    'reply' => $response
]);

?>