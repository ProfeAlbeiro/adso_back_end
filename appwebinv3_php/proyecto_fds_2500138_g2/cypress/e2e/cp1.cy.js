// describe('empty spec', () => {
//   it('passes', () => {
//     cy.visit('http://localhost:8081/proyecto_fds_2500138_g2')
//   })
// })

describe("RF1: iniciar sesión", function(){
  it("CP1: ingreso datos errados empty", ()=>{
    cy.visit('http://localhost:8081/proyecto_fds_2500138_g2')
    cy.get('.m-ingreso > a').click()
    cy.get('#correo').type('admin')
    cy.get('#pass').type('admin')
    cy.get('[type="submit"]').click()
  } );

  
})