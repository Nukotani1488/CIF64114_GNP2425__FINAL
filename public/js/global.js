async function sendData(url, data) {
    console.log(data);
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: data
    });
    return response.json();
}

async function getData(url) {
    const response = await fetch(url);
    return response.json();
}