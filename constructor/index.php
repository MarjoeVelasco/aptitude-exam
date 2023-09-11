<?php
// Define a class called BubbleSort for sorting and processing an array
class BubbleSort
{
    private $arr; // Private property to store the array

    // Constructor to initialize the class with an array
    public function __construct($arr)
    {
        $this->arr = $arr;
    }

    // Method to perform the bubble sort algorithm on the array
    public function sort()
    {
        $n = count($this->arr);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($this->arr[$j] > $this->arr[$j + 1]) {
                    $temp = $this->arr[$j];
                    $this->arr[$j] = $this->arr[$j + 1];
                    $this->arr[$j + 1] = $temp;
                }
            }
        }
    }

    // Method to calculate and return the median of the array
    public function getMedian()
    {
        $n = count($this->arr);
        if ($n % 2 == 0) {
            $mid1 = $this->arr[$n / 2 - 1];
            $mid2 = $this->arr[$n / 2];
            return ($mid1 + $mid2) / 2;
        } else {
            return $this->arr[(int)($n / 2)];
        }
    }

    // Method to get and return the largest value in the sorted array
    public function getLargestValue()
    {
        $n = count($this->arr);
        return $this->arr[$n - 1];
    }

    // Method to get and return the sorted array
    public function getSortedArray()
    {
        return $this->arr;
    }
}

// Define a class called ArrayHandler for processing an array using BubbleSort
class ArrayHandler
{
    private $bubbleSort; // Private property to store the BubbleSort object

    // Constructor to initialize the class with an array
    public function __construct($arr)
    {
        $this->bubbleSort = new BubbleSort($arr);
    }

    // Method to process the array by sorting, calculating median, and finding the largest value
    public function process()
    {
        echo "Original Array: [" . implode(", ", $this->bubbleSort->getSortedArray()) . "]<br>";

        $this->bubbleSort->sort();
        $median = $this->bubbleSort->getMedian();
        $largestValue = $this->bubbleSort->getLargestValue();
        $sortedArray = $this->bubbleSort->getSortedArray();

        // Output the results
        
        echo "Sorted Array: [" . implode(", ", $sortedArray) . "]<br>";
        echo "Median: $median <br>";
        echo "Largest Value: $largestValue<br>";
    }
}

// Example usage:
$array = [3, 1, 5, 2, 4];
$handler = new ArrayHandler($array);
$handler->process();
?>
