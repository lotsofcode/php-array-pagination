## PHP array pagination

This is a basic script to take an array and and generate a paginated list of items. This is quite an obscure example because a real world example would probably include lots more data.

I'd also like to say, if your working with databases then I would suggest using a database pagination script that uses limits etc to optimise the speed of the query etc. If your looking to paginate a small data set then this should be fine.

Pretty simple setup:

### Include the class:

```
// Include the pagination class
include 'pagination.class.php';
```

### Here i'm throwing in some test date (you will need to provide your own)

```
// some example data
foreach (range(1, 100) as $value) {
  $products[] = array(
  'Product' => 'Product '.$value,
  'Price' => rand(100, 1000),
  );
}
```

### Then this is how to output of the page data and page numbers.

```
// If we have an array with items
if (count($products)) {
    // Create the pagination object
    $pagination = new pagination($products, (isset($_GET['page']) ? $_GET['page'] : 1), 15);
    // Parse through the pagination class
    $productPages = $pagination->getResults();
    // If we have items 
    if (count($productPages) != 0) {
        // Create the page numbers
        echo $pageNumbers = '<div class="numbers">'.$pagination->getLinks().'</div>';
        // Loop through all the items in the array
        foreach ($productPages as $productArray) {
            // Show the information about the item
            echo '<p><b>'.$productArray['Product'].'</b> &nbsp; &pound;'.$productArray['Price'].'</p>';
        }
        // print out the page numbers beneath the results
        echo $pageNumbers;
    }
}
```

There are two other configurations that currently exist:

If you would like to show "<< first" and "last >>" links to take you to the first and last page.

```
$pagination->setShowFirstAndLast(true);
````

The default separator for the page numbers is an empty string, you can overwrite this to be anything you like.

````
$pagination->setMainSeperator(' | ');
```

It's pretty simple.