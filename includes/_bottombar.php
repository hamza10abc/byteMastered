</main>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // start: Sidebar
  const sidebarToggle = document.querySelector('.sidebar-toggle')
  const sidebarOverlay = document.querySelector('.sidebar-overlay')
  const sidebarMenu = document.querySelector('.sidebar-menu')
  const main = document.querySelector('.main')
  sidebarToggle.addEventListener('click', function(e) {
    e.preventDefault()
    main.classList.toggle('active')
    sidebarOverlay.classList.toggle('hidden')
    sidebarMenu.classList.toggle('-translate-x-full')
  })
  sidebarOverlay.addEventListener('click', function(e) {
    e.preventDefault()
    main.classList.add('active')
    sidebarOverlay.classList.add('hidden')
    sidebarMenu.classList.add('-translate-x-full')
  })
  document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function(item) {
    item.addEventListener('click', function(e) {
      e.preventDefault()
      const parent = item.closest('.group')
      if (parent.classList.contains('selected')) {
        parent.classList.remove('selected')
      } else {
        document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function(i) {
          i.closest('.group').classList.remove('selected')
        })
        parent.classList.add('selected')
      }
    })
  })
  // end: Sidebar



  // start: Popper
  const popperInstance = {}
  document.querySelectorAll('.dropdown').forEach(function(item, index) {
    const popperId = 'popper-' + index
    const toggle = item.querySelector('.dropdown-toggle')
    const menu = item.querySelector('.dropdown-menu')
    menu.dataset.popperId = popperId
    popperInstance[popperId] = Popper.createPopper(toggle, menu, {
      modifiers: [{
          name: 'offset',
          options: {
            offset: [0, 8],
          },
        },
        {
          name: 'preventOverflow',
          options: {
            padding: 24,
          },
        },
      ],
      placement: 'bottom-end'
    });
  })
  document.addEventListener('click', function(e) {
    const toggle = e.target.closest('.dropdown-toggle')
    const menu = e.target.closest('.dropdown-menu')
    if (toggle) {
      const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu')
      const popperId = menuEl.dataset.popperId
      if (menuEl.classList.contains('hidden')) {
        hideDropdown()
        menuEl.classList.remove('hidden')
        showPopper(popperId)
      } else {
        menuEl.classList.add('hidden')
        hidePopper(popperId)
      }
    } else if (!menu) {
      hideDropdown()
    }
  })

  function hideDropdown() {
    document.querySelectorAll('.dropdown-menu').forEach(function(item) {
      item.classList.add('hidden')
    })
  }

  function showPopper(popperId) {
    popperInstance[popperId].setOptions(function(options) {
      return {
        ...options,
        modifiers: [
          ...options.modifiers,
          {
            name: 'eventListeners',
            enabled: true
          },
        ],
      }
    });
    popperInstance[popperId].update();
  }

  function hidePopper(popperId) {
    popperInstance[popperId].setOptions(function(options) {
      return {
        ...options,
        modifiers: [
          ...options.modifiers,
          {
            name: 'eventListeners',
            enabled: false
          },
        ],
      }
    });
  }
  // end: Popper



  // start: Tab
  document.querySelectorAll('[data-tab]').forEach(function(item) {
    item.addEventListener('click', function(e) {
      e.preventDefault()
      const tab = item.dataset.tab
      const page = item.dataset.tabPage
      const target = document.querySelector('[data-tab-for="' + tab + '"][data-page="' + page + '"]')
      document.querySelectorAll('[data-tab="' + tab + '"]').forEach(function(i) {
        i.classList.remove('active')
      })
      document.querySelectorAll('[data-tab-for="' + tab + '"]').forEach(function(i) {
        i.classList.add('hidden')
      })
      item.classList.add('active')
      target.classList.remove('hidden')
    })
  })
  // end: Tab



  // start: Chart
  new Chart(document.getElementById('order-chart'), {
    type: 'line',
    data: {
      labels: generateNDays(7),
      datasets: [{
          label: 'Active',
          data: generateRandomData(7),
          borderWidth: 1,
          fill: true,
          pointBackgroundColor: 'rgb(59, 130, 246)',
          borderColor: 'rgb(59, 130, 246)',
          backgroundColor: 'rgb(59 130 246 / .05)',
          tension: .2
        },
        {
          label: 'Completed',
          data: generateRandomData(7),
          borderWidth: 1,
          fill: true,
          pointBackgroundColor: 'rgb(16, 185, 129)',
          borderColor: 'rgb(16, 185, 129)',
          backgroundColor: 'rgb(16 185 129 / .05)',
          tension: .2
        },
        {
          label: 'Canceled',
          data: generateRandomData(7),
          borderWidth: 1,
          fill: true,
          pointBackgroundColor: 'rgb(244, 63, 94)',
          borderColor: 'rgb(244, 63, 94)',
          backgroundColor: 'rgb(244 63 94 / .05)',
          tension: .2
        },
      ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  function generateNDays(n) {
    const data = []
    for (let i = 0; i < n; i++) {
      const date = new Date()
      date.setDate(date.getDate() - i)
      data.push(date.toLocaleString('en-US', {
        month: 'short',
        day: 'numeric'
      }))
    }
    return data
  }

  function generateRandomData(n) {
    const data = []
    for (let i = 0; i < n; i++) {
      data.push(Math.round(Math.random() * 10))
    }
    return data
  }
  // end: Chart
</script>

<script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</body>

<!-- export to xlsx code -->
<script type="text/javascript" src="//unpkg.com/xlsx/dist/shim.min.js"></script>
<script type="text/javascript" src="//unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="//unpkg.com/blob.js@1.0.1/Blob.js"></script>
<script type="text/javascript" src="//unpkg.com/file-saver@1.3.3/FileSaver.js"></script>

<script type="text/javascript">
function removeColumn(data, columnName) {
    // Find the index of the column to remove
    const headerRow = data[0];
    const columnIndex = headerRow.indexOf(columnName);

    if (columnIndex === -1) return data; // Column not found

    // Remove the column from each row
    return data.map(row => row.filter((_, index) => index !== columnIndex));
}

function tableToSheet(tableId, columnToExclude) {
    const table = document.getElementById(tableId);
    const ws = XLSX.utils.table_to_sheet(table);
    
    // Convert worksheet to JSON
    const data = XLSX.utils.sheet_to_json(ws, { header: 1 });
    
    // Remove unwanted column
    const filteredData = removeColumn(data, columnToExclude);
    
    // Convert back to worksheet
    return XLSX.utils.aoa_to_sheet(filteredData);
}

function doit(type, fn, dl) {
    const ws = tableToSheet('example', 'Manage'); // Exclude the 'Manage' column
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet JS");
    var filename = exportFilename || 'FileName';
    
    return dl ?
        XLSX.write(wb, {bookType: type, bookSST: true, type: 'base64'}) :
        XLSX.writeFile(wb, filename + '.' + (type || 'xlsx'));
}

function tableau(pid, iid, fmt, ofile) {
    if (typeof Downloadify !== 'undefined') Downloadify.create(pid, {
        swf: 'downloadify.swf',
        downloadImage: 'download.png',
        width: 100,
        height: 30,
        filename: ofile,
        data: function() { return doit(fmt, ofile, true); },
        transparent: false,
        append: false,
        dataType: 'base64',
        onComplete: function() { alert('Your File Has Been Saved!'); },
        onCancel: function() { alert('You have cancelled the saving of this file.'); },
        onError: function() { alert('You must put something in the File Contents or there will be nothing to save!'); }
    });
}

tableau('xlsxbtn', 'xportxlsx', 'xlsx', 'test.xlsx');
</script>
<!-- export to xlsx code -->

</html>