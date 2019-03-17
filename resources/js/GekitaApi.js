import axios from 'axios';

export default class GekitaApi {
    static scenarioCreate(title, body, succeed, fail) {
        axios
            .post("/api/scenario", {title: title, body: body})
            .then((result) => {
                succeed(result);
            })
            .catch((result) => {
                fail(result);
            });
    }

    static scenarioEdit(id, title, body, succeed, fail) {
        axios
            .put("/api/scenario/" + id, {title: title, body: body})
            .then((result) => {
                succeed(result);
            })
            .catch((result) => {
                fail(result);
            });
    }
}
