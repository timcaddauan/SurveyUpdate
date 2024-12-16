let data = [
    // Sample data for demonstration
    { id: 1, Q1: 10, Q2: 15, Q3: 20, Q4: 25, Q5: 30, Q6: 35, Q7: 40, Q8: 45, Q9: 50 },
    { id: 2, Q1: 20, Q2: 25, Q3: 30, Q4: 35, Q5: 40, Q6: 45, Q7: 50, Q8: 55, Q9: 60 },
    // Add more data objects as needed
];

window.dataTable = function () {
    return {
        items: [],
        view: 5,
        searchInput: "",
        pages: [],
        offset: 5,
        pagination: {
            total: data.length,
            lastPage: Math.ceil(data.length / 5),
            perPage: 5,
            currentPage: 1,
            from: 1,
            to: 5,
        },
        currentPage: 1,
        sorted: {
            field: "id", // Default sorting field
            rule: "asc", // Default sorting order
        },
        initData() {
            this.items = data.sort(this.compareOnKey(this.sorted.field, this.sorted.rule));
            this.updatePagination();
            this.showPages();
        },
        compareOnKey(key, rule) {
            return function (a, b) {
                let comparison = 0;
                const fieldA = a[key];
                const fieldB = b[key];

                if (rule === "asc") {
                    comparison = fieldA > fieldB ? 1 : fieldA < fieldB ? -1 : 0;
                } else {
                    comparison = fieldA < fieldB ? 1 : fieldA > fieldB ? -1 : 0;
                }
                return comparison;
            };
        },
        checkView(index) {
            return index >= this.pagination.from && index <= this.pagination.to;
        },
        search(value) {
            if (value.length > 1) {
                const options = {
                    shouldSort: true,
                    keys: ["Q1", "Q2", "Q3", "Q4", "Q5", "Q6", "Q7", "Q8", "Q9"], // Adjust according to your fields
                    threshold: 0,
                };
                const fuse = new Fuse(data, options);
                this.items = fuse.search(value).map((elem) => elem.item);
            } else {
                this.items = data;
            }
            this.updatePagination();
            this.changePage(1);
            this.showPages();
        },
        sort(field, rule) {
            this.sorted.field = field;
            this.sorted.rule = rule;
            this.items.sort(this.compareOnKey(field, rule));
            this.updatePagination();
            this.showPages();
        },
        changePage(page) {
            if (page >= 1 && page <= this.pagination.lastPage) {
                this.currentPage = page;
                this.updatePagination();
                this.showPages();
            }
        },
        updatePagination() {
            const total = this.items.length;
            const lastPage = Math.ceil(total / this.view) || 1;
            const from = (this.currentPage - 1) * this.view + 1;
            const to = this.currentPage * this.view > total ? total : this.currentPage * this.view;

            this.pagination.total = total;
            this.pagination.lastPage = lastPage;
            this.pagination.perPage = this.view;
            this.pagination.from = from;
            this.pagination.to = to;
        },
        showPages() {
            const pages = [];
            let from = this.pagination.currentPage - Math.floor(this.offset / 2);
            if (from < 1) from = 1;
            let to = from + this.offset - 1;
            if (to > this.pagination.lastPage) to = this.pagination.lastPage;

            while (from <= to) {
                pages.push(from++);
            }
            this.pages = pages;
        },
        changeView() {
            this.changePage(1);
            this.updatePagination();
            this.showPages();
        },
        isEmpty() {
            return this.items.length === 0;
        },
    };
};

// Initialize the data table
dataTable().initData();
