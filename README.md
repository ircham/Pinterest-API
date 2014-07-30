Pinterest-API
=============

An unofficial API to get all the pins and boards from a Pinterest user. Check the index.php for a demo.

Methods
-------
Currently there are three methods within this API. One for retrieving all the boards, one for retrieving all pins from a given board and one to retrieve all the pins from an user's account. 

```
<?php
    // Set account
    $pinterest = new Pinterest($accountname); // Create a new instance and give the accountname

    // Get pins from a board
    $pinterest->api->getPinsFromBoard($boardname);
    
    // Get all pins
    $pinterest->api->getPins();
    
    // Get all boards
    $pinterest->api->getBoards();
?>
```

The API returns all data paginated. Default the items per page is set on 25, but this value can be changed. 

```
<?php
    // Set account
    $pinterest = new Pinterest($accountname); // Create a new instance and give the accountname
    $pinterest->itemsperpage = 50; // Default: 25
?>
```

To navigate between pages simply change the ```currentpage``` variable.

```
<?php
    // Set account
    $pinterest = new Pinterest($accountname); // Create a new instance and give the accountname
    $pinterest->currentpage = 2; // Default: 1
?>
```

Thanks to
----------
The API uses the official Pinterest API (v3) to get pins from boards and the [pinterestapi.co.uk](http://pinterestapi.co.uk/) API for retrieving all boards from a user.

