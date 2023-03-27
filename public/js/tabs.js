const tabs = Array.from(document.querySelectorAll('#select-tab'));
const contents = Array.from(document.querySelectorAll('#select-content'));
const selects = document.getElementById('graphs');

function SelectedGraph() {
    contents.forEach(ct => {
        if (contents.indexOf(ct) == selects.value) {
            ct.classList.remove('hidden')
        } else if (contents.indexOf(ct) != selects.value) {
            ct.classList.add('hidden')
        }
    })
}

// Function for Tabs Component
// tabs.forEach(tab => {
//     tab.addEventListener('click', () => {
//         target = tab
//         tabs.forEach(t => {
//             t.classList.remove('tab-active')
//         })
//         target.classList.add('tab-active')

//         const currentTab = tabs.indexOf(target)
//         contents.forEach(ct => {
//             if (contents.indexOf(ct) === currentTab) {
//                 ct.classList.remove('hidden')
//             } else if (contents.indexOf(ct) != currentTab) {
//                 ct.classList.add('hidden')
//             }
//         })
//     })
// })