import React, { Component } from 'react';
import ReactDOM from 'react-dom';

let gekiEditor = document.getElementById("gekiEditor");

export default class GekiEditor extends Component {
    constructor(props) {
        super(props);
        this.state = {
            body: gekiEditor.dataset.body ? gekiEditor.dataset.body : ""
        };
    }

    /* TODO: 入力のエスケープ */
    render() {
        return (
            <div className="row" >
                <div className="col-sm-6">
                <textarea id="gekiBody" className="form-control h-75" onKeyDown={this.tabber} onInput={(e) => {
                    this.setState({body: e.target.value});
                }} defaultValue={this.state.body} />
                </div>
                <div className = "col-sm-6">
                    <div className="card bg-white h-75">
                        <div className = "card-header" > プレビュー </div>
                        <div id="gekiPreview" className="card-body" onWheel={(e) => this.sideScroll(e)}>
                            <table dangerouslySetInnerHTML={{__html: this.convertHtml(this.state.body)}}></table>
                        </div>
                    </div>
                </div>
            </div>
        );
    }

    convertHtml(body) {
        let lines = body.split("\n");
        let result = "";
        for (let i = 0; i < lines.length; i++) {
            let line = lines[i];
            result += this.lineParser(line);
        }
        return result;
    }

    lineParser(line) {
        if (line === '') {
            return '<tr><td colspan="2">　</td></tr>';
        }
        let h1Check = line.match(/^# (.*)/);
        if (h1Check) {
            return '<tr><td colspan="2"><h1>' + h1Check[1] + '</h1></td></tr>';
        }

        let h2Check = line.match(/^## (.*)/);
        if (h2Check) {
            return '<tr><td colspan="2"><h2>' + h2Check[1] + '</h2></td></tr>';
        }

        let h3Check = line.match(/^### (.*)/);
        if (h3Check) {
            return '<tr><td colspan="2"><h3>' + h3Check[1] + '</h3></td></tr>';
        }

        let dooCheck = line.match(/^\t(.*)/);
        if (dooCheck) {
            return '<tr><td colspan="2"><span class="doo">' + dooCheck[1] + '</span></td></tr>'
        }
        let serifs = line.split("\t");
        if (serifs.length >= 2) {
            line = '<tr><td class="align-top"><span class="badge badge-dark">' + serifs[0] + '</span></td><td><span>' + serifs[1] + '</span></td></tr>';
        }
        return line;
    }

    tabber(e) {
        if (e.key === 'Tab' && e.keyCode !== 229) {
            e.preventDefault();
            var elem = e.target;
            var val = elem.value;
            var pos = elem.selectionStart;
            elem.value = val.substr(0, pos) + '\t' + val.substr(pos, val.length);
            elem.setSelectionRange(pos + 1, pos + 1);
        }
    }

    sideScroll(e) {
        if (e.deltaY !== 0) {
            let scrollSize = e.deltaY;
            document.getElementById("gekiPreview").scrollLeft -= scrollSize / 2;
        }
        return false;
    }
}

ReactDOM.render(
    <GekiEditor />,
    gekiEditor
);
