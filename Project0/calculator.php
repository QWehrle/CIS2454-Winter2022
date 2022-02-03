<?php
$MARRIED_STANDARD_DEDUCTION = 25_100;

$START_OF_12_PERCENT_BRACKET = 19_900;
$START_OF_22_PERCENT_BRACKET = 81_050;
$START_OF_24_PERCENT_BRACKET = 172_750;
$START_OF_32_PERCENT_BRACKET = 329_850;
$START_OF_35_PERCENT_BRACKET = 418_850;
$START_OF_37_PERCENT_BRACKET = 628_300;

$name = htmlspecialchars(filter_input(INPUT_GET, 'name'));
$gross_income = filter_input(INPUT_GET, 'gross_income', FILTER_VALIDATE_INT);
$total_deductions = filter_input(INPUT_GET, 'total_deductions', FILTER_VALIDATE_INT);

if ($total_deductions < $MARRIED_STANDARD_DEDUCTION) {
    $total_deductions = $MARRIED_STANDARD_DEDUCTION;
}

$adjusted_gross_income = $gross_income - $total_deductions;

if ($adjusted_gross_income < 0) {
    $adjusted_gross_income = 0;
}

$taxes_owed_at_10_percent = 0;
$taxes_owed_at_12_percent = 0;
$taxes_owed_at_22_percent = 0;
$taxes_owed_at_24_percent = 0;
$taxes_owed_at_32_percent = 0;
$taxes_owed_at_35_percent = 0;
$taxes_owed_at_37_percent = 0;

$income_to_be_taxed = $adjusted_gross_income;

if ($income_to_be_taxed > $START_OF_37_PERCENT_BRACKET) {
    $taxes_owed_at_37_percent = ($income_to_be_taxed - $START_OF_37_PERCENT_BRACKET) * .37;
    $income_to_be_taxed = $START_OF_37_PERCENT_BRACKET;
}

if ($income_to_be_taxed > $START_OF_35_PERCENT_BRACKET) {
    $taxes_owed_at_35_percent = ($income_to_be_taxed - $START_OF_35_PERCENT_BRACKET) * .35;
    $income_to_be_taxed = $START_OF_35_PERCENT_BRACKET;
}

if ($income_to_be_taxed > $START_OF_32_PERCENT_BRACKET) {
    $taxes_owed_at_32_percent = ($income_to_be_taxed - $START_OF_32_PERCENT_BRACKET) * .32;
    $income_to_be_taxed = $START_OF_32_PERCENT_BRACKET;
}

if ($income_to_be_taxed > $START_OF_24_PERCENT_BRACKET) {
    $taxes_owed_at_24_percent = ($income_to_be_taxed - $START_OF_24_PERCENT_BRACKET) * .24;
    $income_to_be_taxed = $START_OF_24_PERCENT_BRACKET;
}

if ($income_to_be_taxed > $START_OF_22_PERCENT_BRACKET) {
    $taxes_owed_at_22_percent = ($income_to_be_taxed - $START_OF_22_PERCENT_BRACKET) * .22;
    $income_to_be_taxed = $START_OF_22_PERCENT_BRACKET;
}

if ($income_to_be_taxed > $START_OF_12_PERCENT_BRACKET) {
    $taxes_owed_at_12_percent = ($income_to_be_taxed - $START_OF_12_PERCENT_BRACKET) * .12;
    $income_to_be_taxed = $START_OF_12_PERCENT_BRACKET;
}

if ($income_to_be_taxed > 0) {
    $taxes_owed_at_10_percent = $income_to_be_taxed * .1;
    $income_to_be_taxed = 0;
}

$total_taxes_owed = $taxes_owed_at_10_percent + $taxes_owed_at_12_percent +
        $taxes_owed_at_22_percent + $taxes_owed_at_24_percent +
        $taxes_owed_at_32_percent + $taxes_owed_at_35_percent +
        $taxes_owed_at_37_percent;

if ($gross_income == 0 || $adjusted_gross_income == 0) {
    $taxes_as_percentage_of_gross_income = 0;
    $taxes_as_percentage_of_adjusted_gross_income = 0;
} else {
    $taxes_as_percentage_of_gross_income = $total_taxes_owed / $gross_income * 100;
    $taxes_as_percentage_of_adjusted_gross_income = $total_taxes_owed / $adjusted_gross_income * 100;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>2021 Married Income Tax Estimator</title>
    </head>
    <body>
        <?php echo $name ?><br>

        <?php echo "Taxes owed at 10% : $ $taxes_owed_at_10_percent" ?><br>

        <?php echo "Taxes owed at 12% : $ $taxes_owed_at_12_percent" ?><br>

        <?php echo "Taxes owed at 22% : $ $taxes_owed_at_22_percent" ?><br>

        <?php echo "Taxes owed at 24% : $ $taxes_owed_at_24_percent" ?><br>

        <?php echo "Taxes owed at 32% : $ $taxes_owed_at_32_percent" ?><br>

        <?php echo "Taxes owed at 35% : $ $taxes_owed_at_35_percent" ?><br>

        <?php echo "Taxes owed at 37% : $ $taxes_owed_at_37_percent" ?><br>

        <?php echo "Total taxes owed: $ $total_taxes_owed" ?><br>

        <?php echo "Taxes owed as a percentage of gross income: $taxes_as_percentage_of_gross_income%" ?><br>

        <?php echo "Taxes owed as a percentage of adjusted gross income: $taxes_as_percentage_of_adjusted_gross_income%" ?><br>
        <a href="index.php">go back to index</a>
    </body>
</html>
