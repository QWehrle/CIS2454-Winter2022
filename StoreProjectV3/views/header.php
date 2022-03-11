
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Item Shop</title>
    </head>
    <body>
        <header>
            <h2>Welcome to our awesome item shop!</h2>
        </header>
        <nav>
            <a href='index.php'>Home</a>&nbsp;
            <?php if (!isset($_SESSION['is_logged_in_as_admin']) ) { ?>
            <a href='login.php'>Login</a>&nbsp;
            <?php } else { ?>
            <a href='login.php?action=logout'>Logout</a>&nbsp;
            <a href='item.php'>Items</a>&nbsp;
            <a href='customer.php'>Customers</a>&nbsp;
            <a href='transaction.php'>Transactions</a>&nbsp;
            <a href='line_item.php'>Line Items</a>&nbsp;
            <?php } ?>
        </nav>