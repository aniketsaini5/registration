function updateYearOptions() {
    var courseSelect = document.getElementById("course");
    var yearSelect = document.getElementById("year");

    // Clear previous options
    yearSelect.innerHTML = '<option value="" disabled selected>Select Year</option>';

    // Add options based on the selected course
    if (courseSelect.value === "Bpharma") {
        addYearOption(yearSelect, "I");
        addYearOption(yearSelect, "II");
        addYearOption(yearSelect, "III");
        addYearOption(yearSelect, "IV");
    } else if (courseSelect.value === "Dpharma") {
        addYearOption(yearSelect, "I");
        addYearOption(yearSelect, "II");
    }
}

function addYearOption(selectElement, year) {
    var option = document.createElement("option");
    option.value = year;
    option.text = year;
    selectElement.add(option);
}