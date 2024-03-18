<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Drag and Drop Example</title>
<style>
  /* CSS styles */
  .container {
    border: 2px solid #ccc;
    padding: 10px;
    margin: 20px auto;
    width: 300px;
  }

  .item {
    background-color: #f0f0f0;
    border: 1px solid #999;
    margin-bottom: 5px;
    padding: 5px;
    cursor: pointer;
  }

  .item.dragging {
    background-color: orangered;
  }
</style>
</head>
<body>

<div class="container" id="container">
  <div class="item" draggable="true">Item 1</div>
  <div class="item" draggable="true">Item 2</div>
  <div class="item" draggable="true">Item 3</div>
  <div class="item" draggable="true">Item 4</div>
</div>

<script>
// JavaScript code
const container = document.getElementById('container');
let draggingItem = null;

container.addEventListener('dragstart', (e) => {
  draggingItem = e.target;
  e.target.classList.add('dragging');
});

container.addEventListener('dragend', (e) => {
  draggingItem.classList.remove('dragging');
  draggingItem = null;
});

container.addEventListener('dragover', (e) => {
  e.preventDefault();
  const afterElement = getDragAfterElement(container, e.clientY);
  const itemBeingDragged = document.querySelector('.dragging');
  if (afterElement == null) {
    container.appendChild(itemBeingDragged);
  } else {
    container.insertBefore(itemBeingDragged, afterElement);
  }
});

function getDragAfterElement(container, y) {
  const draggableItems = [...container.querySelectorAll('.item:not(.dragging)')];
  return draggableItems.reduce((closest, child) => {
    const box = child.getBoundingClientRect();
    const offset = y - box.top - box.height / 2;
    if (offset < 0 && offset > closest.offset) {
      return { offset: offset, element: child };
    } else {
      return closest;
    }
  }, { offset: Number.NEGATIVE_INFINITY }).element;
}
</script>

</body>
</html>
