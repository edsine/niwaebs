<li class="nav-item" id="myTaskLayouts">
    <a class="nav-link" href="#">
        <i class="fas fa-users menu-icon"></i>
        <span class="menu-title">Report</span>
        <i class="menu-arrow"></i>
    </a>
    <ul class="nav flex-column sub-menu">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('report.account.statement') }}">Account Statement</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('report.invoice.summary') }}">Invoice Summary</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('report.bill.summary') }}">Bill Summary</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('report.product.stock.report') }}">Product Stock</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('report.monthly.cashflow') }}">Cash Flow</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('report.income.summary') }}">Income Summary</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('report.expense.summary') }}">Expense Summary</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('report.income.vs.expense.summary') }}">Income Vs Expense</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('report.tax.summary') }}">Tax Summary</a>
        </li>
        
    </ul>
</li>