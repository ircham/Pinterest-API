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

The API returns all data paginated. By default the items per page is set on ```25```, but this value can be changed easily. 

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

Image size
----------
The API only returns the 237x image size, but with a simple ```str_replace()``` you can also retrieve the bigger (736x) image.
```
<?php
    $pinsresult = $pinterest->api->getPins();
    
    foreach( $pinsresult["data"] as $pin ){
        $bigimage = str_replace("237x", "736x", $pin->images->{'237x'}->url);
    }
?>
```

Cache
-------------
Loading all the data from Pinterest can take a moment. So to prevent API from running too long i've added caching. At the moment it's just a simple but effective file caching. The script will try to create the ```./cache``` if it doesn't exist directory so be sure that your permissions have been set right. 

Returned data
-------------
The API returns a paginated array containing all the pins or boards. Below is an example of a response (JSON encoded)
```
{
    total_items: 500,
    items_per_page: 25,
    total_pages: 20,
    current_page: 1,
    data: [
        {
            attribution: null,
            description: "10 Misverstanden over Het Nieuwe Werken - News - Het Nieuwe Werken",
            pinner: {
                about: "Wij zijn een full-service bureau voor interieurprojecten. Wij ontwerpen, realiseren managen turn-key creatieve en duurzame interieurs.",
                location: "Utrecht",
                full_name: "Rever Interieurprojecten",
                follower_count: 48,
                image_small_url: "http://media-cache-ec0.pinimg.com/avatars/reverinspiratie_1393949212_30.jpg",
                pin_count: 525,
                id: "506444058005094518",
                profile_url: "http://www.pinterest.com/reverinterieur/"
            },
            repin_count: 0,
            dominant_color: "#eff7ee",
            like_count: 0,
            link: "https://cbreprojects.nl/hetnieuwewerken/news/detail/spread-propertynl/",
            images: {
                237x: {
                    url: "http://media-cache-ec0.pinimg.com/237x/1e/5d/e7/1e5de7f618686727bd373f8b032280bd.jpg",
                    width: 237,
                    height: 101
                }
            },
            embed: null,
            is_video: false,
            id: "506443920570421590"
        },
        [...]
    ]
}
```

Thanks to
----------
The API uses the official Pinterest API (v3) to get pins from boards and the [pinterestapi.co.uk](http://pinterestapi.co.uk/) API for retrieving all boards from a user.

