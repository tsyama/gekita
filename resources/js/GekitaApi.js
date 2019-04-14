import axios from 'axios';

export default class GekitaApi {
    static scenarioList(id, token, succeed, fail) {
        axios
            .get("/api/user/" + id + "/scenarios", {
                params: {
                    token: token
                }
            })
            .then((result) => {
                succeed(result);
            })
            .catch((result) => {
                fail(result);
            })
    }

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

    static scenarioDelete(id, succeed,fail) {
        axios
            .delete("/api/scenario/" + id)
            .then((result) => {
                succeed(result);
            })
            .catch((result) => {
                fail(result);
            });
    }
}
