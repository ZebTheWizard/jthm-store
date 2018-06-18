<?php

function money(int $price) : string {
  return money_format("%i", $price / 100);
}
