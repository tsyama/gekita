import React, { Component } from 'react';

export default class ScenarioDeleteBtn extends Component {
    constructor(props) {
        super(props);
        this.state = {
            scenarioId: props.scenario_id
        };
    }

    render() {
        return (
            <button className="btn btn-sm btn-outline-danger btn-block scenario-delete-btn"
                    data-scenario-id={this.state.scenarioId}>削除</button>
        );
    }
}
