<form action="{{ route('guarantees.store') }}" method="POST">
    @csrf
    <div>
        <label for="corporate_reference_number">Corporate Reference Number:</label>
        <input type="text" name="corporate_reference_number" required>
    </div>
    <div>
        <label for="guarantee_type">Guarantee Type:</label>
        <select name="guarantee_type" required>
            <option value="Bank">Bank</option>
            <option value="Bid Bond">Bid Bond</option>
            <option value="Insurance">Insurance</option>
            <option value="Surety">Surety</option>
        </select>
    </div>
    <div>
        <label for="nominal_amount">Nominal Amount:</label>
        <input type="number" name="nominal_amount" required>
    </div>
    <div>
        <label for="nominal_amount_currency">Currency:</label>
        <input type="text" name="nominal_amount_currency" required>
    </div>
    <div>
        <label for="expiry_date">Expiry Date:</label>
        <input type="date" name="expiry_date" required>
    </div>
    <div>
        <label for="applicant_name">Applicant Name:</label>
        <input type="text" name="applicant_name" required>
    </div>
    <div>
        <label for="applicant_address">Applicant Address:</label>
        <input type="text" name="applicant_address" required>
    </div>
    <div>
        <label for="beneficiary_name">Beneficiary Name:</label>
        <input type="text" name="beneficiary_name" required>
    </div>
    <div>
        <label for="beneficiary_address">Beneficiary Address:</label>
        <input type="text" name="beneficiary_address" required>
    </div>
    <button type="submit">Create Guarantee</button>
</form>
