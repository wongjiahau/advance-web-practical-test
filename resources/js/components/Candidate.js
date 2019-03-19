import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Candidate extends Component {
    constructor(props) {
        super(props);
        this.state = {
            candidates: null
        };
    }

    componentDidMount() {
        const { mode } = this.props;
        switch (mode.type) {
            case "SINGLE":
                return this.fetchSingle(mode.candidate_id);
            case "ALL":
                return this.fetchAll();
        }
    }

    fetchSingle(id) {
        const url = "/api/candidates/" + id;
        fetch(url, {
            headers: {
                Accept: 'application/json'
            },
            credentials: 'same-origin'
        })
        .then((response) => {
            if (!response.ok) {
                throw new Error([response.status, response.statusText].join(' '));
            } else {
                return response.json();
            }
        }).then((body) => {
            this.setState({ candidates: [body.data] });
        });
    }

    fetchAll() {
        const url = "/api/candidates";
        fetch(url, {
            headers: {
                Accept: 'application/json'
            },
            credentials: 'same-origin'
        })
        .then((response) => {
            if (!response.ok) {
                throw new Error([response.status, response.statusText].join(' '));
            } else {
                return response.json();
            }
        }).then((body) => {
            this.setState({ candidates: body.data });
        });
    }

    render() {
        switch (this.props.mode.type) {
            case "SINGLE":
                return this.renderSingle();
            case "ALL":
                return this.renderAll();
        }
    }

    renderSingle() {
        return this.renderAll();
    }

    renderAll() {
        const { candidates } = this.state;
        if (!candidates) {
            return <p>Loading data . . .</p>;
        } else {
            const rows = candidates.map(({id, name, party}) => (
                <tr>
                    <td>{id}</td>
                    <td>{name}</td>
                    <td>{party.name}</td>
                </tr>
            ));
            return (
                <div className="table-responsive">
                    <table className="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Candidate name</th>
                                <td>Party</td>
                            </tr>
                        </thead>
                        <tbody>
                            {rows}
                        </tbody>
                    </table>
                </div>
            )
        }
    }
}

(() => {
    const element = document.getElementById('contents-candidates')
    if (element) {
        ReactDOM.render(<Candidate mode={window.CANDIDATE_PAGE_MODE}/>, element);
    } else {
        alert("ho")
    }
})();