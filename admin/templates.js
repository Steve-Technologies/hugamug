let global;
fetch('../apis/general_data.php')
  .then(response => {
    // Check if the response is successful
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    // Parse the JSON data from the response
    return response.json();
  })
  .then(data => {
    // Assign the fetched JSON data to a variable
    global = data;
    const sidebar = document.createElement('template');
sidebar.innerHTML = `
<aside>
<div class="top">
    <div class="logo">
        <img src='`+global['site_logo']+`alt="`+global['site_name']+`">
        <h2>`+global['site_name']+`</h2>
    </div>
    <div id="close-btn" class="close">
        <span class="material-symbols-rounded">
            close
        </span>
    </div>
</div>
<div class="sidebar">
    <a href="#" class="active">
        <span class="material-symbols-rounded">
            dashboard
        </span>
        <h3>Dashboard</h3>
    </a>
    <a href="orders.php">
        <span class="material-symbols-rounded">
            assignment
        </span>
        <h3>Orders</h3>
    </a>
    <a href="#">
        <span class="material-symbols-rounded">
            monitoring
        </span>
        <h3>Analytics</h3>
    </a>
    <a href="#">
        <span class="material-symbols-rounded">
            restaurant
        </span>
        <h3>Menu</h3>
    </a>
    <a href="#">
        <span class="material-symbols-rounded">
            grocery
        </span>
        <h3>Items</h3>
    </a>
    <a href="#">
        <span class="material-symbols-rounded">
            group
        </span>
        <h3>Users</h3>
    </a>
    <a href="#">
        <span class="material-symbols-rounded">
            settings
        </span>
        <h3>Settings</h3>
    </a>
</div>
</aside>
`; 

parent = document.querySelector('#main-container')
parent.appendChild(sidebar.content);
    

    // Now you can use the jsonData variable to access the fetched data
  })
  .catch(error => {
    console.error('There was a problem fetching the data:', error);
  });
