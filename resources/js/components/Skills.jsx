import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import IconPulse from './icon-pulse';

const Skills = () => {

  const [skills, setSkills] = useState([]);
  const [fetching, setFetching] = useState(false);

  const data = async () => {
    setFetching(true);
    try {
      const req = await fetch('http://localhost:8000/skills');
      const res = await req.json();
      setSkills(res)
      setFetching(false);
    } catch (error) {
      console.log(error);
      setFetching(false);
    }
  }

  useEffect(() => {
    data();
  }, []);
  useEffect(() => {
    if(skills.length > 0){
      
    }
  }, [skills]);

  return (
    <React.Fragment>
      { fetching ? (
        <div className="flex items-center justify-center flex-col">
          <IconPulse/>
          <p className="text-xs text-gray-500 block mt-2">Cargando...</p>
        </div>
      ) : (
        skills.map(item => (
          <p key={item.id}>{ item.name }</p>
        ))
      ) }
    </React.Fragment>
  );
};

export default Skills;

if (document.getElementById('example')) {
  ReactDOM.render(<Skills />, document.getElementById('example'));
}
