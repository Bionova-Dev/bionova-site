const ftp = require("basic-ftp");
async function list() {
    const client = new ftp.Client();
    try {
        await client.access({
            host: "ftp.cluster129.hosting.ovh.net",
            user: "bionovf",
            password: "ADMbiono123"
        });
        const themes = await client.list("/www/wp-content/themes");
        themes.forEach(t => console.log(t.name));
    } catch(e) {
        console.error(e);
    }
    client.close();
}
list();
