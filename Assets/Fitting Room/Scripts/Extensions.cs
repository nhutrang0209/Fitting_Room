using UnityEngine;
using System.Reflection;

namespace Fitting_Room
{
    public static class Extensions
    {
        public static void CopyComponent(Cloth original, GameObject destination)
        {
            Cloth newCloth = destination.AddComponent<Cloth>();
            newCloth.useGravity = original.useGravity;

            newCloth.capsuleColliders = original.capsuleColliders;
            newCloth.sphereColliders = original.sphereColliders;
            newCloth.bendingStiffness = original.bendingStiffness;
            
            ChangeConstraints(newCloth, 0.2f);
        }
        
        private static void ChangeConstraints(Cloth clothComponent, float maxDistance)
        {
            var newConstraints = clothComponent.coefficients;

            for(int i = 0; i< newConstraints.Length; ++i)
            {
                newConstraints[i].maxDistance = maxDistance;
            }

            clothComponent.coefficients = newConstraints;
        }
    }
}