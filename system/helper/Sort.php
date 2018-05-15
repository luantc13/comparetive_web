<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

function selectionSortUp($array = []) {
	for ($i = 0; $i < count($array) - 1; $i++) {
		$min = $i;
		for ($j = $i + 1; $j < count($array); $j++) {
			if ($array[$j]->price < $array[$min]->price) {
				$min = $j;
			}
		}

		$temp = $array[$min];
		$array[$min] = $array[$i];
		$array[$i] = $temp;
	}

	return $array;
}

function selectionSortDown($array = []) {
	for ($i = 0; $i < count($array) - 1; $i++) {
		$max = $i;
		for ($j = $i + 1; $j < count($array); $j++) {
			if ($array[$j]->price > $array[$max]->price) {
				$max = $j;
			}
		}

		$temp = $array[$max];
		$array[$max] = $array[$i];
		$array[$i] = $temp;
	}

	return $array;
}