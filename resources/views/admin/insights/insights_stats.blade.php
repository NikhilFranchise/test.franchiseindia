<style>
    /* body {
        background-color: #f4f4f4;
    } */

    .insights-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        max-width: 1100px;
        margin: 40px auto;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .insights-title {
        font-weight: 600;
        color: #333333;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-inline .form-group {
        margin-right: 20px;
    }

    .form-inline input {
        width: 180px;
        padding: 0px;
        border-radius: 3px;
        border: 1px solid #161515;
        height: auto;
    }

    .form-inline .form-label {
        font-weight: 500;
        margin: 5px 10px 0px 20px;
    }

    .form-inline .col-md-3 {
        margin: 15px 0px 10px 20px;
        display: flex;
    }

    .col-md-6 {
        display: inline-block;
        width: 48%;
        vertical-align: top;
        margin-left: 1%;

    }

    .insight-card {
        border: 1px solid #dddddd;
        border-radius: 8px;
        background-color: #fafafa;
        padding: 20px;
        margin-bottom: 20px;
    }

    .insight-card h5 {
        margin-bottom: 15px;
        font-size: 18px;
        color: #ffffff;
        padding: 10px 15px;
        border-radius: 5px;
    }

    .insight-card ul {
        list-style: none;
        padding-left: 0;
    }

    .insight-card li {
        margin-bottom: 8px;
        font-size: 16px;
    }

    .english-header {
        background-color: #007bff;
    }

    .hindi-header {
        background-color: #28a745;
    }

    .form-inline .btn-primary {
        width: 180px;
        margin-left: 30px;
        border-radius: 2px;
    }

    .form-inline .btn-warning {
        width: 180px;
        margin-left: 30px;
    }
</style>

@if (
    (session()->get('role') != 'ga' && session()->get('adminEmail') == 'techsupport@franchiseindia.net') ||
        (session()->get('role') != 'ga' && session()->get('adminEmail') == 'pganesh@franchiseindia.net'))

    <div class="insights-container">
        <h4 class="insights-title">Insights Monthly Stats Search</h4>

        <form method="get" class="form-group form-inline">
            <div class="col-md-3">
                <label for="from_date" class="form-label"><strong>From Date</strong><span> :</span></label>
                <input type="date" name="from_date" class="" value="{{ request('from_date') }}">
                <label for="to_date" class="form-label"><strong>To Date</strong><span> :</span></label>
                <input type="date" name="to_date" class="" value="{{ request('to_date') }}">

                <button type="submit" class="btn btn-primary" value="Filter">Search</button>
                <a href="{{ url()->current() }}" class="btn btn-warning">Reset</a>
            </div>
        </form>

        @if (isset($englishCounts) && isset($hindiCounts))
            <div class="row">
                <div class="col-md-6">
                    <div class="insight-card">
                        <h5 class="english-header">English Insights</h5>
                        <ul>
                            <li><strong>Articles:</strong> {{ $englishCounts->article_count }}</li>
                            <li><strong>News:</strong> {{ $englishCounts->news_count }}</li>
                            <li><strong>Interviews:</strong> {{ $englishCounts->interview_count }}</li>
                            <li><strong>Reports:</strong> {{ $englishCounts->report_count }}</li>
                            <li><strong>Others:</strong> {{ $englishCounts->others_count }}</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="insight-card">
                        <h5 class="hindi-header">Hindi Insights</h5>
                        <ul>
                            <li><strong>Articles:</strong> {{ $hindiCounts->article_count }}</li>
                            <li><strong>News:</strong> {{ $hindiCounts->news_count }}</li>
                            <li><strong>Interviews:</strong> {{ $hindiCounts->interview_count }}</li>
                            <li><strong>Reports:</strong> {{ $hindiCounts->report_count }}</li>
                            <li><strong>Others:</strong> {{ $hindiCounts->others_count }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endif
