let items_api_url = '../../test_admin_apis/items.json'
if(document.querySelector('#item-table tbody')){

  fetch_item_table();

  function fetch_item_table(){
    item_view = document.querySelector('#item_view');

fetch(items_api_url)
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
  items = data;
  low_threshold = items.low_threshold;
  critical_threshold = items.critical_threshold;
  items_data = items.data;
  currency_prefix = items.currency_prefix;

    item_table_tbody= document.querySelector('#item-table tbody');
    update_table(items_data, item_table_tbody, item_view, low_threshold, critical_threshold, currency_prefix)
  // Now you can use the jsonData variable to access the fetched data
})
.catch(error => {
  console.error('There was a problem fetching the data:', error);
});
}


function update_table(items_data, item_table_tbody, item_view, low_threshold, critical_threshold, currency_prefix){
  items_data.forEach((items_datum) => {
      const row = document.createElement('tr');
      const SKUCell = document.createElement('td');
      SKUCell.textContent = items_datum.SKU;
      row.appendChild(SKUCell);

      const itemNameCell = document.createElement('td');
      itemNameCell.textContent = items_datum.item_name;
      row.appendChild(itemNameCell);

      const categoryCell = document.createElement('td');
      categoryCell.textContent = items_datum.category;
      row.appendChild(categoryCell);

      const stockCell = document.createElement('td');
      stockCell.className = items_datum.stock <= critical_threshold ? 'danger-trow' : items_datum.stock <= low_threshold ? 'warning-trow' : 'success-trow';
      const statusSpan = document.createElement('span');
      statusSpan.textContent = items_datum.stock;
      stockCell.appendChild(statusSpan);
      row.appendChild(stockCell);

      const costCell = document.createElement('td');
      costCell.textContent =  currency_prefix+' '+items_datum.cost;
      row.appendChild(costCell);

      const SPCell = document.createElement('td');
      SPCell.textContent = items_datum.selling_price;
      row.appendChild(SPCell);

      const profitCell = document.createElement('td');
      profitCell.textContent = items_datum.profit;
      row.appendChild(profitCell);

      const btnColCell = document.createElement('td');
      btnColCell.className = 'btn-col';
      const viewBtn = document.createElement('button');
      viewBtn.onclick = (e)=>{
        item_view.showModal();
      }
      viewBtn.tooltip = 'View';
      viewBtn.className = 'primary-btn tooltip';
      const viewIcon = document.createElement('span');
      viewIcon.className = 'material-symbols-rounded';
      viewIcon.textContent = 'visibility';
      viewBtn.appendChild(viewIcon);
      btnColCell.appendChild(viewBtn);
      const editLink = document.createElement('a');
      editLink.href = '#';
      editLink.tooltip = 'Edit';
      editLink.className = 'primary-btn';
      const editIcon = document.createElement('span');
      editIcon.className = 'material-symbols-rounded';
      editIcon.textContent = 'edit';
      editLink.appendChild(editIcon);
      btnColCell.appendChild(editLink);
      row.appendChild(btnColCell);
      item_table_tbody.appendChild(row);
      });
    }
    }

let add_item_btn = document.querySelector('#add_item_btn');
let add_item_popup = document.querySelector('#add_item_popup');
add_item_btn.addEventListener('click', (e)=>{
  add_item_popup.showModal();
})

let items_category_api_url = "../../test_admin_apis/category_select.json"
$(document).ready(function () {
  fetch(items_category_api_url)
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
    $('#category-select').selectize({
      sortField: 'text',
      valueField : 'option',
      labelField : 'option',
      options : data
  });
    // Now you can use the jsonData variable to access the fetched data
  })
  .catch(error => {
    console.error('There was a problem fetching the data:', error);
  });
});
